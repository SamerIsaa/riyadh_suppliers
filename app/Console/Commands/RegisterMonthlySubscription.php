<?php

namespace App\Console\Commands;

use App\Jobs\SubscriptionJob;
use App\Model\Subscription;
use Illuminate\Console\Command;

class RegisterMonthlySubscription extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscription:register';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Register Subscription to payment log table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $items = Subscription::query()->where('is_active', 1)->where('status', Subscription::ACCEPTED)
            ->where('started_at', '<=', now()->toDateString())->where(function ($q) {
                $q->whereNull('ended_at')->orWhere('ended_at' , '>=' , now()->toDateString());
            })->get();
//        subscription:register
        $year = now()->year;
        $month = now()->month;

        foreach ($items as $item){
            $payment_log_this_month = $item->user->paymentLog()->where('subscription_id' , $item->id)->where('is_subscription' , 1)
                ->whereYear('created_at', '=', $year)
                ->whereMonth('created_at', '=', $month)->exists();

            if (!$payment_log_this_month){

                dispatch(new SubscriptionJob($item));//->delay(now()->addMinutes(10));

            }
        }

        return 0;
    }
}
