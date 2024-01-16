<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get([
            'id',
            'name',
            'description',
            'photo',
        ]);
        return view('home',  ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('forms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::create($request->all());

        if ($request->hasFile('photo')){
            $file = $request->file('photo');

            $extension = $file->getClientOriginalExtension();

            $photo = $product->id . '_photo.' . $extension;

            $request->file('photo')->move(base_path(). '/public/img/', $photo);
        }

        $product->photo = $photo;
        $product->save();

        return redirect()->route ('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view ('forms.show',['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view ('forms.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        if ($request->hasFile('photo')){
            $file = $request->file('photo');

            $extension = $file->getClientOriginalExtension();

            $photo = $product->id . '_photo.' . $extension;

            $request->file('photo')->move(base_path(). '/public/img/', $photo);
        }

        $product->photo = $photo;
        $product->save();

        return redirect()->route ('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $path = base_path ("public/img/{$product->photo}");

        if (File::exists($path)){
            File::delete($path);
        }
        $product->delete();

        return redirect()->route('products.index');

    }
}
