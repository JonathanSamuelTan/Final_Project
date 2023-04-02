<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('dashboard', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('AddProduct');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        validate ($request, [
            'ProductName' => 'required|min:5|max:80',
            'Price' => 'required|numeric',
        ]);

        Product::create([
            'ProductName' => $request->ProductName,
            'CategoryId' => $request->CategoryId,
            'Price' => $request->Price,
            'Quantity' => $request->Quantity,
            // default value for ProductIMG is default-product.png
            'ProductIMG' => $request->ProductIMG ?? 'default-product.png',
        ]);
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
