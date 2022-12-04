<?php

namespace Database\Seeders;


use App\Models\Gateway;
use DB;
use Illuminate\Database\Seeder;

class GatewaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gateway::truncate();

        $paypalCredentials = [
            'client_id' => '',
            'client_secret' => '',
            'app_id' => 'APP-80W284485P519543T',
            'mode' => 'sandbox'
        ];
        $paypalCurrency = [
            'AUD', 'BRL', 'CAD', 'CZK', 'DKK', 'EUR', 'HKD', 'HUF', 'INR', 'ILS', 'JPY',
            'MYR', 'MXN', 'TWD', 'NZD', 'NOK', 'PHP', 'PLN', 'GBP', 'RUB', 'SGD', 'SEK', 'CHF', 'THB', 'USD'
        ];

        // ======================= stripe =========================

        $stripeCredentials = [
            'stripe_key' => 'pk_test_51KHQhKAmfDlh6wQq4srkOEY3FkivTCXmRSb7bJqr90q3ZkVWAR2AkRWfKBnegpmKAHea5cNVAToiy7yoa3Q075mR00jlhXsZTO',
            'stripe_secret' => 'sk_test_51KHQhKAmfDlh6wQqXfg4ZScnTRahxbdXV0mKw30nOI4f8gtB2v5rho7IyJtZqkf8SwwuNgLTO2WPGFyk9vnFl8gO00MhSe8Kbj',
        ];

        $stripeCurrency = [
            'USD', 'AUD', 'BRL', 'CAD', 'CHF', 'DKK', 'EUR', 'GBP', 'HKD', 'INR', 'JPY', 'MXN', 'MYR', 'NOK', 'NZD', 'PLN', 'SEK', 'SGD',
        ];


        // ===================== mollie ============================

        $mollieCredentials = [
            'api_key' => 'test_intSTCDEBaDSu28D6DUpn5wnQhTnzB',
        ];

        $mollieCurrency = [
            'USD', 'EUR'
        ];


        // ===================== Perfect Money ============================

        $perfectmoneyCredentials = [
            'PM_ACCOUNTID' => 96793260,
            'PM_PASSPHRASE' => '77887848a',
            'PM_MARCHANTID' => 'U36928259',
            'PM_MARCHANT_NAME' => "tdevs",
        ];

        $perfectmoneyCurrency = [
            'USD', 'EUR'
        ];

        // ===================== coinbase ============================

        $coinbaseCredentials = [
            'api_key' => '6526b61a-1c43-4a03-8704-c716a85bca5e',
            'api_version' => '2018-03-22',
            'api_secret' => 'b789f547-8954-4880-89ae-5a0233006647',
        ];

        $coinbaseCurrency = [
            'USD', 'EUR'
        ];


        // ===================== paystack ============================

        $paystackCredentials = [
            'public_key' => 'pk_test_8e60e513e47ba5619ac0888c9fac99f2853641fa',
            'secret_key' => 'sk_test_e521a3c6d1c37897092868e02e0ddba8c3f0aa01',
            'merchant_email' => 'learn2222earn@gmail.com',
        ];

        $paystackCurrency = [
            'GHS'
        ];

        // ===================== voguepay ============================

        $voguepayCredentials = [
            'merchant_id' => 'sandbox_760e43f202878f651659820234cad9',
        ];

        $voguepayCurrency = [
            'NGN'
        ];

        // ================================== data insert ================

        DB::table('gateways')
            ->insert(
                [
                    [
                        'gateway_code' => 'paypal',
                        'name' => 'Paypal',
                        'logo' => 'assets/images/gateway/paypal.png',
                        'credentials' => json_encode($paypalCredentials),
                        'supported_currency' => json_encode($paypalCurrency),
                    ],
                    [
                        'gateway_code' => 'stripe',
                        'name' => 'Stripe',
                        'logo' => 'assets/images/gateway/stripe.png',
                        'credentials' => json_encode($stripeCredentials),
                        'supported_currency' => json_encode($stripeCurrency),
                    ],
                    [
                        'gateway_code' => 'mollie',
                        'name' => 'Mollie',
                        'logo' => 'assets/images/gateway/mollie.png',
                        'credentials' => json_encode($mollieCredentials),
                        'supported_currency' => json_encode($mollieCurrency),
                    ],
                    [
                        'gateway_code' => 'perfectmoney',
                        'name' => 'Perfect Money',
                        'logo' => 'assets/images/gateway/perfectmoney.png',
                        'credentials' => json_encode($perfectmoneyCredentials),
                        'supported_currency' => json_encode($perfectmoneyCurrency),
                    ],
                    [
                        'gateway_code' => 'coinbase',
                        'name' => 'Coinbase',
                        'logo' => 'assets/images/gateway/coinbase.png',
                        'credentials' => json_encode($perfectmoneyCredentials),
                        'supported_currency' => json_encode($perfectmoneyCurrency),
                    ],
                    [
                        'gateway_code' => 'paystack',
                        'name' => 'Paystack',
                        'logo' => 'assets/images/gateway/paystack.png',
                        'credentials' => json_encode($paystackCredentials),
                        'supported_currency' => json_encode($paystackCurrency),
                    ],
                ]
            );
    }
}
