<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\Faq;
use App\Model\Page;
use App\Model\Product;
use App\Model\Service;
use App\Model\Slider;

class HomeController extends Controller
{
    public function index()
    {
        $data['services'] = Service::query()->active()->with('translations')->latest()->take(4)->get();
        $data['offers'] = Product::query()->active()->featured()->with('translations')->latest()->take(4)->get();
        $data['products'] = Product::query()->active()->notFeatured()->with('translations')->latest()->take(4)->get();
        $data['faqs'] = Faq::query()->active()->with('translations')->latest()->take(3)->get();
        $data['sliders'] = Slider::query()->active()->with('translations')->latest()->get();

        return view('front.index', $data);
    }

    public function faqs()
    {
        $data['faqs'] = Faq::query()->active()->with('translations')->get();

        return view('front.faqs', $data);

    }
    public function page($id)
    {
        $data['item'] = Page::query()->with('translations')->findOrFail($id);

        return view('front.page', $data);

    }
}
