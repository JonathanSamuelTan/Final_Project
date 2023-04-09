<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

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
        // chech if product quantity is 0 from db
        $product = Product::where('id', $request->ProductID)->first();
        if( $product->Quantity > 0){
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
        }else{
            // echo "Product is out of stock"
            return redirect()->back()->with('error', 'Barang sudah habis, silakan tunggu hingga barang di-restock ulang');
        }
    }

    
    public function increaseQuantity(Request $request, $product_id){
        // user cant increase quantity above product quantity
        $product = Product::where('id', $product_id)->first();
        $cart = Cart::where('product_id', $product_id)->first();
        if ($cart->quantity < $product->Quantity) {
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
