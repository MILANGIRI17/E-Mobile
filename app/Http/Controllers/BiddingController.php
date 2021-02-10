<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bidding;
use App\bid;
use Illuminate\Support\Facades\Auth;

class BiddingController extends Controller
{
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
        $user_id=auth::id();
        $check=bidding::where('user_id',$user_id)->first();
        if(empty($check)){
            $validation=$request->validate([
                'bid'=>'required',
            ]);
            $bidding=new bidding([
                'bid_id'=>$request->get('bid_id'),
                'user_id'=>$user_id,
                'bid_price'=>$request->get('bid'),
            ]);
            $bidding->save(); 
            return redirect('/home/bid')->with('success','successfully bided');
        }
        else{
            $check->bid_price=$request->get('bid');
            $check->save();
            return redirect('/home/bid')->with('success','successfully bided');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=bidding::where('bid_id',$id)->get();
        return view('admin/detailBid',compact('data'));
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
        //
    }
}
