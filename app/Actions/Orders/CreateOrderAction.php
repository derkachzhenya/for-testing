<?php

namespace App\Actions\Orders;

use App\Models\Inventory;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class CreateOrderAction
{
    public function handle(array $data): Order
    {
        return DB::transaction(function () use ($data) {
            $order = Order::create([
                'user_id' => $data['user_id'],
                'total' => $data['total'],
                'status' => 'pending',
            ]);

            $order->payment()->create([
                'amount' => $data['total'],
                'status' => 'pending',
            ]);

            Inventory::where('product_id', $data['product_id'])
                ->decrement('quantity', $data['quantity']);

            return $order;
        });
    }
}






