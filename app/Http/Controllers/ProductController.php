<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

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
        $categories = Category::all();
        return view('AddProduct', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $extension = $request->ProductIMG->getClientOriginalExtension();
        $fileName = $request->ProductName . '_' . time() . '.' . $extension;
        $request->ProductIMG->storeAs('public/product', $fileName);
        
        Product::create([
            'ProductName' => $request->ProductName,
            'CategoryID' => $request->CategoryID,
            'Price' => $request->Price,
            'Quantity' => $request->Quantity,
            'ProductIMG' => $fileName ?? 'default-product.png',
        ]);
        return redirect()->route('AdminPanel');
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
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('UpdateProduct', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        // check if the user has uploaded a new image
        if ($request->hasFile('ProductIMG')) {
            // delete the old image from storage
            Storage::delete('public/product/'.$product->ProductIMG);
            // get original extension from new image
            $extension = $request->ProductIMG->getClientOriginalExtension();
            //file name = product name + current time + extension
            $fileName = $request->ProductName . '_' . time() . '.' . $extension;
            // save the new image to storage/public/product
            $request->ProductIMG->storeAs('public/product', $fileName);
            // update the product
            $product->update([
                'ProductName' => $request->ProductName,
                'CategoryID' => $request->CategoryID,
                'Price' => $request->Price,
                'Quantity' => $request->Quantity,
                // save the new image to storage/public/product
                'ProductIMG' => $fileName
            ]);
        } else {
            $product->update([
                'ProductName' => $request->ProductName,
                'CategoryID' => $request->CategoryID,
                'Price' => $request->Price,
                'Quantity' => $request->Quantity,
            ]);
        }
        return redirect()->route('AdminPanel');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        Storage::delete('public/product/'.$product->ProductIMG);
        $product->delete();
        return redirect()->route('AdminPanel');
    }

    public function admin()
    {
        $products = Product::all();
        return view('AdminPanel', compact('products'));
    }
}
