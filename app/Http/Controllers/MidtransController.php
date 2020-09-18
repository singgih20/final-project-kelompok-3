<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MidtransController extends Controller
{
    public function generate(Request $request)
    {
        \Midtrans\Config::$serverKey = config('app.midtrans.server_key');

        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $midtrans_transaction = \Midtrans\Snap::createTransaction($request->data);

        return response()->json([
            'data' => $midtrans_transaction
        ]);
    }
}
