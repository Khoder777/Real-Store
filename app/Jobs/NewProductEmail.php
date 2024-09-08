<?php

namespace App\Jobs;

use App\Models\Customer;
use App\Models\Product;
use App\Notifications\NewProductNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NewProductEmail implements ShouldQueue
{
    use Queueable;

    public $product;
    /**
     * Create a new notification instance.
     */
    public function __construct(Product $product)
    {
        $this->product=$product;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $customers=Customer::get();
        foreach($customers as $customer)
        {
            $customer->notify(new NewProductNotification($this->product));
        }
     
    }
}
