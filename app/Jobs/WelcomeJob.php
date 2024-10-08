<?php

namespace App\Jobs;

use App\Models\Customer;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class WelcomeJob implements ShouldQueue
{
    use Queueable,SerializesModels,InteractsWithQueue,Dispatchable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $customers=Customer::get();
        foreach($customers as $customer)
        {
            $customer->full_name='asd';
            $customer->save();
            // $customer->notify(new VerifyEmailNotification());
        }
    }
}
