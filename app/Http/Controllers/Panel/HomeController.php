<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Model\BankTransfer;
use App\Model\PaymentLog;
use App\Model\Product;
use App\Model\User;

class HomeController extends Controller
{

    public function index()
    {
        $data['users_count'] = User::query()->count();
        $data['products_count'] = Product::query()->count();

        return view('panel.index' , $data);
    }

}
