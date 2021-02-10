<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bid;
use App\product;

class BidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=bid::all()->sortByDesc('id');
        return view('admin/bid',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_id=$request->get('product_id');
        $product=product::find($product_id);
        $bid=new bid([
            'name' => $product->name,
            'brand' => $product->brand,
            'price' =>$product->price,
            'display' => $product->display,
            'processor' => $product->processor,
            'ram' => $product->ram,
            'storage' => $product->storage,
            'battery' => $product->battery,
            'front_camera' => $product->front_camera,
            'rear_camera' => $product->rear_camera,
            'os' => $product->os, 
            'image'=>$product->image,     
        ]);
        $bid->save();
        $product->delete();
        return redirect()->back()->with('success','Product added for bidding');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bid=bid::find($id);
        $bid->delete();
        return redirect()->back()->with('success','Product deleted from bidding');
    }
}
