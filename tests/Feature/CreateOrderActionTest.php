<?php

use App\Actions\Orders\CreateOrderAction;
use App\Models\Inventory;
use App\Models\Payment;
use App\Models\User;

it('creates a pending order and payment while decrementing inventory', function () {
    $user = User::factory()->create();
    $inventory = Inventory::factory()->create([
        'product_id' => 123,
        'quantity' => 10,
    ]);

    $order = app(CreateOrderAction::class)->handle([
        'user_id' => $user->id,
        'product_id' => $inventory->product_id,
        'quantity' => 3,
        'total' => 199.99,
    ]);

    expect($order)
        ->user_id->toBe($user->id)
        ->status->toBe('pending')
        ->and($order->payment)
        ->toBeInstanceOf(Payment::class)
        ->amount->toBe('199.99')
        ->status->toBe('pending');

    expect($inventory->refresh()->quantity)->toBe(7);
});
