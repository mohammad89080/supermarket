<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request; //هذا المسؤول على حمل الطلبات من المستخدم إلى الكونترولير

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //
//        $product=Product::all();
        $products=Product::latest()->paginate(4);
        return view('product.index',compact('products'));
    }
    public function trashedProducts()
    {
        //
//        $product=Product::all();
        $products=Product::onlyTrashed()->latest()->paginate(4);
        return view('product.trash',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //
        return view('product.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'detail'=>'required'
        ]);

        $product = Product::create($request->all());
        return redirect()->route('products.index')
            ->with('success','product added successflly') ;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Product $product)
    {
        //
        return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Product $product)
    {
        //
        return view('product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Product $product)
    {
        //
        $request->validate(
            [
                'name' =>'required',
                'price' => 'required',
                 'detail' => 'required'
            ]
        );
//        $product=Product::update($request->all());
        $product->update($request->all());
        return redirect()->route('products.index')
            ->with('success','product updated successflly');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return redirect()->route('products.index')
            ->with('success','product deleted  successflly');

    }
    public function softDelete($id )
    {
        //
        Product::find($id)->delete();

        return redirect()->route('products.index')
            ->with('success','product deleted  successflly');

    }
    public function deleteForEver($id )
    {
        //
        Product::onlyTrashed()->where('id',$id)->first()->forceDelete();

        return redirect()->route('product.trash')
            ->with('success','product deleted  successflly');

    }
    public function backSoftDelete($id )
    {
        //
        $products=Product::onlyTrashed()->where('id',$id)->first()->restore();

        return redirect()->route('products.index')
            ->with('success','product deleted  successflly');

    }
}
