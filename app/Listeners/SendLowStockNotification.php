<?php

namespace App\Listeners;

use App\Events\LowStock;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendLowStockNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(LowStock $event): void
    {
        // $product = $event->product;
        // $supplierEmail = $product->supplier->email;

        // Mail::send('mail.low_stock', ['product' => $product], function ($message) use ($supplierEmail) {
        //     $message->to($supplierEmail)
        //         ->subject('Low Stock Alert');
        // });
        $product = $event->product;
        $supplierEmail = $product->supplier->email;

        Mail::send('mail.low_stock', ['product' => $product], function ($message) use ($supplierEmail) {
            $message->from('alerts@lmpa.shop', 'Lister Motor Parts & Accessories')
                ->to($supplierEmail)
                ->subject('Low Stock Alert');
        });
    }
}
