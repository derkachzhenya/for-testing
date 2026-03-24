<?php

namespace App\Http\Controllers;

use App\Models\Invoice;

class InvoiceController extends Controller
{
    public function index()
    {
        // ❌ Before
        $overdue = Invoice::where('due_at', '<', now())->get();
        $upcoming = Invoice::where('due_at', '>', now())->get();

        // ✅ After — Laravel 13
        $overdue = Invoice::wherePast('due_at')->get();
        $upcoming = Invoice::whereFuture('due_at')->get();
    }
}