<?php

namespace App\Services;

use App\Jobs\ProcessOrder;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderService
{
    public function create(array $data): Order
    {
        return DB::transaction(function () use ($data) {
            $order = Order::create($data);

            ProcessOrder::dispatch($order)
                ->afterCommit();

            return $order;
        });
    }
}