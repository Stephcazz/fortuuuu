<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;

class PinController extends Controller
{
    public function show()
    {
        return view('pin');
    }

    public function verify(Request $request)
    {
        $pin = $request->input('pin');

        $client = Clients::where('pin', $pin)->first();

        if (!$client) {
            return response()->json([
                'success' => false,
                'message' => 'Code PIN incorrect'
            ]);
        }

        return response()->json([
            'success' => true,
            'redirect' => '/login'
        ]);
    }
}
