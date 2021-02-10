<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\compare;
use App\product;

class CompareController extends Controller
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
        $user=Auth::user();
        $check=compare::where('user_id',$user->id)->get();
        $count=0;
        foreach($check as $value){
            $count=$count+1;
        }
        if($count<2){
            $compare=new compare([
                'user_id'=>Auth::id(),
                'product_id'=>$request->get('product_id'),
            ]);
            $compare->save();
            if($count==1){
               $data=compare::where('user_id',$user->id)->get();
               return view('compare',compact('data'));
            }
            return redirect()->back()->with('success','Please select another product to compare');
        }
        else{
            $first=1;
            foreach($check as $value){
                if($first==2){
                    $value->delete();
                }
                else{
                    $first=2;
                    $compare=new compare([
                        'user_id'=>Auth::id(),
                        'product_id'=>$request->get('product_id'),
                    ]);
                    $compare->save();
                }
            }
            $data=compare::where('user_id',$user->id)->get();
            return view('compare',compact('data'));
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
        //
    }
}
