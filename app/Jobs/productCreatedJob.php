<?php

namespace App\Jobs;

use App\Mail\newProductAvailableEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class productCreatedJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */

     public $product_details;
     public $user_details;
    public function __construct($product)
    {
     $this->product_details=$product;
     $this->user_details =[
        "name"=>"mubarak louis"
     ];
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $name = "mubarak";
        Mail::to('kual62319@gmail.com',$name)->send(new newProductAvailableEmail($this->product_details,$this->user_details));
    }
}
