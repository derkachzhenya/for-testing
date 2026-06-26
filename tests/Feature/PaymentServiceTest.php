<?php

use App\Jobs\ProcessPayment;
use App\Models\Order;
use App\Models\Payment;
use App\Services\PaymentService;

it('marks a pending payment and order as paid', function () {
    $order = Order::factory()
        ->has(Payment::factory()->state([
            'amount' => 199.99,
            'status' => 'pending',
        ]), 'payment')
        ->create([
            'total' => 199.99,
            'status' => 'pending',
        ]);

    $payment = app(PaymentService::class)->process($order);

    expect($payment)
        ->status->toBe('paid')
        ->amount->toBe('199.99')
        ->and($order->refresh())
        ->status->toBe('paid');
});

it('does not create a duplicate payment when processed again', function () {
    $order = Order::factory()
        ->has(Payment::factory()->state([
            'amount' => 49.50,
            'status' => 'paid',
        ]), 'payment')
        ->create([
            'total' => 49.50,
            'status' => 'paid',
        ]);

    $payment = app(PaymentService::class)->process($order);

    expect($payment->is($order->payment()->first()))->toBeTrue()
        ->and($order->payment()->count())->toBe(1);
});

it('processes an order through the queued job handler', function () {
    $order = Order::factory()
        ->has(Payment::factory()->state([
            'status' => 'pending',
        ]), 'payment')
        ->create([
            'status' => 'pending',
        ]);

    (new ProcessPayment($order))->handle(app(PaymentService::class));

    expect($order->refresh()->status)->toBe('paid')
        ->and($order->payment()->first()->status)->toBe('paid');
});
