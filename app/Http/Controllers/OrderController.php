<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\cart;
use App\User;
use App\product;
use App\order;
use App\order_detail;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
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
        //
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
        $user=Auth::user();
        $validation=$request->validate([
            'name'=>'required',
            'number'=>'required',
            'address'=>'required',
        ]);

        $user->name=$request->get('name');
        $user->phone_no=$request->get('number');
        $user->address=$request->get('address');
        $user->save();

        $carts=cart::where('client_id',$user_id)->get();
        $order=new order([
            'client_id'=>$user_id,
        ]);
        $order->save();
        foreach ($carts as  $cart) {
            $order_detail=new order_detail([
                'order_id'=>$order->id,
                'product_id'=>$cart->product_id,
                'quantity'=>$cart->quantity,
                'total_price'=>$cart->quantity*$cart->product->price,
                'status'=>'No',
            ]);
            $order_detail->save();
            $cart->delete();
        }
        return redirect('cart')->with('success','Order Confirmed');
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
        $order=order_detail::find($id);
        $order->status='delivered';
        $order->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
