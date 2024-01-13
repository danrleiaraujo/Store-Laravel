<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

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
            'name',
            'description',
            'photo',
        ]);
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
    public function show($id)
    {
        $product = Product::finOrfail($id);

        return view ('forms.show',['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view ('forms.edit',['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
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

        return redirect()->action ([ProductController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $path = base_path ("public/img/{$product->photo}");

        if (File::exists($path)){
            File::delete($path);
        }
        $product->delete();

        return redirect()->action([ProductController::class,'index']);

    }
}
