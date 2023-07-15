<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\Property;


class ProductController extends Controller
{
    public function index()
    {
        $data['properties'] = Property::query()->active()->with('options')->get();
        $data['products'] = Product::query()->active();

        if (request()->filled('is-offer') && request('is-offer') == 1) {
            $data['products'] = $data['products']->featured();
        } else {
            $data['products'] = $data['products']->notFeatured();
        }
        $data['products'] = $data['products']->latest()->with('translations')->paginate(12);
        return view('front.products.index', $data);
    }

    public function show($id)
    {
        $data['item'] = Product::query()->findOrFail($id);
        $data['images'] = json_decode($data['item']->images, true);

        return view('front.products.show',$data);
    }
}
