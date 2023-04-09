<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;

class TransactionController extends Controller
{

    public function create(){
        $user = auth()->user();
        $carts =  Cart::where('email', $user->email)->get();
        // generate InvoiceNo (random 10 digit number). Must be unique in Transaction table
        do {
            $InvoiceNo = mt_rand(1000000000, 9999999999);
        } while(Transaction::where('InvoiceNo', $InvoiceNo)->exists());

        return view('transaction', compact('user', 'carts','InvoiceNo'));
    }

    public function store(Request $request){
        $user = auth()->user();
        $carts =  Cart::where('email', $user->email)->get();
        $transaction = Transaction::create ([
            'InvoiceNo' => $request->InvoiceNo,
            'email' => $user->email,
            'ZIPCode' => $request->ZIPCode,
            'Address' => $request->address,
        ]);
        foreach($carts as $cart){
            TransactionDetail::create([
                'InvoiceNo' => $request->InvoiceNo,
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
            ]);

            $product = Product::find($cart->product_id);
            $product->Quantity = $product->Quantity - $cart->quantity;
            $product->save();
        }
        Cart::where('email', $user->email)->delete();
        return redirect()->route('dashboard')->with('success', 'Transaction Successful');
    }
}
