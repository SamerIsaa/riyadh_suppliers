<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Model\Page;
use GuzzleHttp\Psr7\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class HomeController extends Controller
{

    public function index()
    {
        return view('welcome');
    }

    public function setLanguage($locale)
    {
        app()->setLocale($locale);
        $url = LaravelLocalization::getLocalizedURL($locale, url()->previous());
        LaravelLocalization::setLocale($locale);
        return redirect($url);
    }

    public function privacy_policy()
    {
        $data['page'] = Page::find(2);
        return view('privacy', $data);
    }

    public function contact()
    {
        return view('contact');
    }

    public function storeContact(Request $request)
    {

    }
}
