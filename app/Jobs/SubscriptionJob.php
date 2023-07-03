<?php

namespace App\Jobs;

use App\Model\PaymentLog;
use App\Notifications\MonthlySubscriptionNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SubscriptionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $item;

    public function __construct($item)
    {
        $this->item = $item;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $year = now()->year;
        $month = now()->month;

        $payment_log_this_month = $this->item->user->paymentLog()->where('subscription_id', $this->item->id)->whereYear('created_at', '=', $year)
            ->whereMonth('created_at', '=', $month)->exists();

        if (!$payment_log_this_month) {
            $item = PaymentLog::create([
                'user_id' => $this->item->user['id'],
                'is_subscription' => 1,
                'amount' => $this->item['monthly_installment'],
                'status' => PaymentLog::PENDING,
                'subscription_id' => $this->item['id']
            ]);
            $this->item->user->notify(new MonthlySubscriptionNotification($item));
        }


    }
}
