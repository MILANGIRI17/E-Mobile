<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\cart;
use App\User;
use App\product;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id= Auth::id();
        $user=Auth::user();
        $data=cart::where('client_id',$user_id)->get();
        return view('cart',compact('data','user'));
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
        $user_id= Auth::id();
        $product_id=$request->get('product_id');
        
        $check=cart::where([
            ['client_id',$user_id],
            ['product_id',$product_id],
        ])->first();
        if(!empty($check)){
            $check->quantity=$check->quantity+1;
            $check->save();
        }
        else{
            $cart=new cart([
                'client_id'=>$user_id,
                'product_id'=>$product_id,
                'quantity'=>1,
            ]);
            $cart->save();
        }
        return redirect()->back()->with('success','Product added to cart.');
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
        $cart=cart::find($id);
        $cart->delete();
        return redirect('cart')->with('success','Product deleted from cart');
    }
}
