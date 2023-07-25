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
        $data['products'] = Product::query()->active()->filter();

        if (request()->filled('is-offer') && request('is-offer') == 1) {
            $data['products'] = $data['products']->featured();
        } else {
            $data['products'] = $data['products']->notFeatured();
        }
        $data['products'] = $data['products']->latest()->with('translations')->paginate(12);

        if (request()->expectsJson()){
            $html = view('front.products.partials.content', $data)->render();

            return response()->json([
                'status' => true,
                'html' => $html,
            ]);
        }
        return view('front.products.index', $data);
    }

    public function show($id)
    {
        $data['item'] = Product::query()->findOrFail($id);
        $data['images'] = json_decode($data['item']->images, true);

        $data['similar_products'] = Product::query()
            ->where('id' , '<>' , $id)
            ->where('category_id' , @$data['item']->category_id)->get();
        return view('front.products.show',$data);
    }
}
