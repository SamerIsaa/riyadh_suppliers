<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function profile()
    {
        $data['user'] = auth()->user();
        return view('front.user.profile', $data);
    }

}
