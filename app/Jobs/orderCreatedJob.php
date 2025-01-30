<?php

namespace App\Jobs;

use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class orderCreatedJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public $order_details;
    public function __construct($order)
    {
      $this->order_details= $order;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $Product =Product::find($this->order_details->product_id);
        $Product->inventory -= $this->order_details->count;

    }
}
