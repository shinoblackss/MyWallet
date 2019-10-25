<?php

namespace App\Http\Controllers;

use App\Transfer;
use App\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wallet = Wallet::firstOrFail();

        return response()->json($wallet->load('tranfers'), 200);
    }

    public function store(Request $request){


        if($request->description[0] == null)
        {
            $description = 'no name';
        }else{
            $description = $request->description[0];
        }

        $wallet = Wallet::find($request->wallet_id);
        $wallet->money = $wallet->money + $request->amount[0];
        $wallet->update();

        $transfer = Transfer::create([
            'description' => $description,
            'amount' => $request->amount[0],
            'wallet_id' => $request->wallet_id,
        ]);

        return response()->json($transfer, 201);
    }
}
