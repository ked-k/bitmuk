<?php

namespace App\Http\Controllers;

use AmrShawky\LaravelCurrency\Facade\Currency;
use App\Helpers\FileHelper;
use App\Models\Faq;
use App\Models\Home;
use App\Models\Page;
use App\Models\Subscribe;
use Artisan;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Fluent;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        $isExists = Storage::disk('root')->exists('installed');

        if ($isExists) {
            $homePage = setting_get('home_page');

            $homeData = Home::where('status', 1)->orderBy('sort')->get();

            if ($homePage == 1) {
                return view('frontend.home.home', compact('homeData'));
            } elseif ($homePage == 2) {
                return view('frontend.home.home_2', compact('homeData'));
            }
        } else {

            Artisan::call('view:clear');
            Artisan::call('config:clear');
            Artisan::call('route:clear');
            Artisan::call('cache:clear');

            return redirect('install');
        }


    }


    public function currencyConvert(Request $request)
    {

        $from = $request->from;
        $to = $request->to;
        $amount = $request->amount;

        $data = Currency::convert()
            ->from($from)
            ->to($to)
            ->amount($amount)
            ->get();

        return json_encode($data);
    }


    public function getPage($name)
    {
        $data = Page::where('url', '/page/' . $name)->first();

        $content = json_decode($data->component, true);


        if ($data->type == 'static') {
            return view('frontend.pages.' . $name, compact('content'));

        } else {
            return view('frontend.pages.dynamic', compact('content'));
        }
    }


    public function homePage()
    {
        $home = Home::orderBy('sort')->get();
        return view('backend.home.home_page', compact('home'));
    }


    public function homeSection($section)
    {
        $section = Home::where('name', $section)->first();
        return view('backend.home.home_section_edit', compact('section'));
    }


    public function homeSectionUpdate($id, Request $request)
    {

        $homeSection = Home::find($id);

        $input = $request->except(['_token', '_method']);


        $fillData = json_decode($homeSection->content, true);
        foreach ($input as $key => $value) {

            $imgArray = explode("_", $key);
            $img = in_array('image', $imgArray);

            if ($img) {
                $imageName = FileHelper::uploadImage($request, $key);
                $fillData[$key] = 'img/' . $imageName;
            } else {
                $fillData[$key] = $value;
            }
        }
        $homeSection->fill(['content' => json_encode($fillData)]);
        $homeSection->save();

        Flash::success('Home Section updated successfully.');

        return redirect(route('admin.home.page'));
    }


    public function homePageStatus(Request $request)
    {
        $home = Home::find($request->id);
        $home->status = $request->status;
        $home->save();
        return response()->json(['success' => 'Status change successfully.']);
    }

    public function updatePageOrder(Request $request)
    {
        $home = Home::all();
        foreach ($home as $section) {
            foreach ($request->order as $order) {
                if ($order['id'] == $section->id) {
                    $section->update(['sort' => $order['position']]);
                }
            }
        }

        return response('Update Successfully.', 200);
    }


    public function getFaq($categoryId)
    {

        $data = Page::where('url', '/page/faq')->first();

        $content = json_decode($data->component, true);

        $faqs = Faq::where('faq_category_id', $categoryId)->get();

        return view('frontend.pages.include.__single_faq', compact('faqs', 'content'));
    }


    public function nowSubscribe(Request $request)
    {
        $email = $request->email;
        Subscribe::create(['email' => $email, 'status' => 'active']);
        notify()->success('Subscribe Successfully');
        return redirect()->back();
    }

    public function contactNow(Request $request)
    {

        $sendMail = config('mail.from.address');

        $details = new Fluent($request->all());
        \Mail::to( $sendMail )->send(new \App\Mail\SendMail($details));

        notify()->success('Contact Message Send Successfully');
        return redirect()->back();
    }


    public function notify(Request $request)
    {
        $notify = $request->data;
        return view('frontend.notify.success', compact('notify'));
    }

}
