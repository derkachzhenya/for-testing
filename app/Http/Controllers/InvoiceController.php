<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class InvoiceController extends Controller
{
    public function download()
    {
        $url = Storage::temporaryUrl(
            'documents/report.pdf',
            now()->addMinutes(10)
        );

        return redirect($url);
    }
}














