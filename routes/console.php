<?php

use App\Jobs\WelcomeJob;
use App\Models\Customer;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Notifications\VerifyEmailNotification;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();
Schedule::call(function () {
    $customers=Customer::get();
    foreach($customers as $customer)
    {
     
        $customer->notify(new VerifyEmailNotification());
    }
})->everyMinute();