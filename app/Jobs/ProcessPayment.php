<?php

namespace App\Jobs;

use App\Models\Order;
use App\Services\PaymentService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\Attributes\WithoutRelations;

#[WithoutRelations]
class ProcessPayment implements ShouldQueue
{
    use Queueable;

    public function __construct(public Order $order) {}

    public function handle(PaymentService $paymentService): void
    {
        $paymentService->process($this->order);
    }
}
