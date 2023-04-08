<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // get all from cart based on user email
        $carts = Cart::where('email', auth()->user()->email)->get();
        return view('Cart', compact('carts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // check if product already in cart
        $cart = Cart::where('email', auth()->user()->email)->where('product_id', $request->ProductID)->first();
        if($cart){
           //
        }else{
            // if product not in cart, create new cart
            $cart = new Cart;
            $cart->email = auth()->user()->email;
            $cart->product_id = $request->ProductID;
            $cart->quantity = 1;
            $cart->save();
        }
        return redirect()->back();
    }

    
    public function increaseQuantity(Request $request, $product_id){
        $cart = Cart::where('product_id', $product_id)->first();

        if ($cart) {
            $cart->quantity += 1;
            $cart->save();
        }

        return redirect()->back();
    }

    public function decreaseQuantity(Request $request, $product_id){
        $cart = Cart::where('product_id', $product_id)->first();

        if ($cart) {
            $cart->quantity -= 1;
            if ($cart->quantity == 0) {
                $cart->delete();
            } else {
                $cart->save();
            }
        }

        return redirect()->back();
    }
    public function destroy(string $id)
    {
        //
    }
}
