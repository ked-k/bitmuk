<?php

namespace App\Http\Controllers;

use App\Facades\Transaction;
use App\Models\Balance;
use App\Models\User;
use HTTP_Request2;

class AppBaseController extends Controller
{
    public function cronJob()
    {

        $trans = \App\Models\Transaction::where('status','pending')->where(function ($query){

           return $query->where('gateway','Airtel Money')
                ->orWhere('uuid', '!=', Null);

        })->get();


        $headers = array(
            'Content-Type' => 'application/json',
        );
        $request_body = array(
            'client_id' => '7794ff5d-6144-4019-8229-4ccd062eb9eb',
            'client_secret' => '43b0df1b-a0fb-4877-8cdb-a39c9ea58e65',
            'grant_type' => 'client_credentials'
        );

        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST','https://openapi.airtel.africa/auth/oauth2/token', array(
                'headers' => $headers,
                'json' => $request_body,
            )
        );

        $access_token = json_decode($response->getBody()->getContents())->access_token;


        $headers2 = array(
            'Content-Type' => 'application/json',
            'X-Country' => 'UG',
            'X-Currency' => 'UGX',
            'Authorization' => $access_token,
        );



        //mtn token

        //api user config
        $mtnSubscriptionKey = "410ede8a05774376a42f25c1dfc6f473";
        $mtnApiUser = "0eacb1f0-c892-4712-ba1d-1b13e571ec31";
        $mtnApikey = "fb312965907d4b09a2b681743ef8a598";

        // ========== mtn  token generate ======================
        $mtnTokenGenerate = new Http_Request2('https://proxy.momoapi.mtn.com/collection/token/');
        $mtnTokenHeaders = array(
            // Request headers
            'Authorization' => 'Basic '. base64_encode($mtnApiUser . ":" . $mtnApikey),
            'Ocp-Apim-Subscription-Key' => $mtnSubscriptionKey,
        );

        $mtnTokenGenerate->setHeader($mtnTokenHeaders);
        $mtnTokenGenerate->setMethod(HTTP_Request2::METHOD_POST);

        $mtnTokenResponse = $mtnTokenGenerate->send();
        $mtn_token = json_decode($mtnTokenResponse->getBody())->access_token;

        foreach ($trans as $tran)
        {
            
            
            
            //mtn money cron job
            if (null != $tran->uuid){
                $payStatus = new Http_Request2('https://proxy.momoapi.mtn.com/collection/v1_0/requesttopay/'.$tran->uuid);
                $payurl = $payStatus->getUrl();

                $payheaders = array(
                    'Authorization' => 'Bearer '.$mtn_token,
                    'X-Target-Environment' => 'mtnuganda',
                    'Ocp-Apim-Subscription-Key' => $mtnSubscriptionKey,
                );
                $payStatus->setHeader($payheaders);
                $payStatus->setMethod(HTTP_Request2::METHOD_GET);

                $payresponse = $payStatus->send();

                $paybody = json_decode($payresponse->getBody());



                if (isset($paybody->status) && $paybody->status == 'SUCCESSFUL'){

                    $tran->update(
                        [
                            'status' => 'success',
                            'payment_status' => 'paid',
                        ]);


                    $balance = Balance::where('user_id', $tran->user_id)->where('wallet_name', $tran->wallet_name)->firstOrNew(
                        ['user_id' => $tran->user_id],
                        ['wallet_name' => $tran->wallet_name]
                    );

                    $balance->amount += $tran->amount;
                       $balance->save();
                    
                     return '...';

                }
                if(isset($paybody->status) && $paybody->status == 'FAILED'){
                    $tran->update(
                        [
                            'status' => 'fail',
                        ]);
                        
                        return '...';
                }
            }
            
            
            $response2 = $client->request('GET','https://openapi.airtel.africa/standard/v1/payments/'.$tran->trxid, array(
                    'headers' => $headers2,
                    'json' =>  array(),
                )
            );
            $status = json_decode($response2->getBody()->getContents())->data->transaction->status ?? 'TF';


            if ($status == 'TS'){

                   $tran->update(
                    [
                        'status' => 'success',
                        'payment_status' => 'paid',
                    ]);


                $balance = Balance::where('user_id', $tran->user_id)->where('wallet_name', $tran->wallet_name)->firstOrNew(
                    ['user_id' => $tran->user_id],
                    ['wallet_name' => $tran->wallet_name]
                );

                $balance->amount += $tran->amount;
                $balance->save();
            }
            elseif($status == 'TF')
            {
                $tran->update(
                    [
                        'status' => 'fail',
                    ]);
            }

        }

        return '.....';

    }
}
