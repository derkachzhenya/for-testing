<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Jobs\ProcessPayment;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Notifications\NewOrderNotification;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{
    public function store(StoreOrderRequest $request)
    {
        $order = Order::create([
            'user_id' => $request->user()->id,
            'total' => 199,
        ]);

        Mail::to($request->user())
            ->send(new OrderMail());

        Notification::send(
            [$request->user()],
            new NewOrderNotification()
        );

        Cache::forget('dashboard_stats');

        Log::info('Order created');

        ProcessPayment::dispatch($order);

        return redirect()->back();
    }
}


