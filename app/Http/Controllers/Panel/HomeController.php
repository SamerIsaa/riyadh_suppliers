<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Model\BankTransfer;
use App\Model\PaymentLog;
use App\Model\User;

class HomeController extends Controller
{

    public function index()
    {
//        $data['all_users'] = User::all()->count();
//        $data['total_incomes'] = PaymentLog::query()->where('type' , 'income')->sum('amount');
//        $data['total_expense'] = PaymentLog::query()->where('type' , 'expense')->sum('amount');
//        $data['new_users'] = User::query()->whereDate('created_at' , '>=' , now()->subDays(10)->toDateString())->count();
//        $data['last_bank_transfers'] = BankTransfer::query()->latest()->take(5)->get();
        return view('panel.index');
    }

}
