<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\rate;
use App\bid;
use App\compare;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','samsung','iphone','xiaomi','detail','search']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data=product::all()->sortByDesc('id');
        return view('home',compact('data'));
    }
    public function samsung()
    {
        $data=product::where('brand','Samsung')->orderBy('created_at', 'desc')->get();
        $category='Samsung';
        return view('category',compact('data','category'));
    }
    public function iphone()
    {
        $data=product::where('brand','Iphone')->orderBy('created_at', 'desc')->get();
        $category='Iphone';
        return view('category',compact('data','category'));
    }
    public function xiaomi()
    {
        $data=product::where('brand','Xiaomi')->orderBy('created_at', 'desc')->get();
        $category='Xiaomi';
        return view('category',compact('data','category'));
    }

    public function detail($id){
        $data=product::find($id);
        $count=0;
        $total=0;
        foreach($data->rate as $rate_value){
            $total=$total+$rate_value->rate;
            $count=$count+1;
        }
        if($count>0){
            $rating=$total/$count;
            return view('detail',compact('data','rating'));
        }
        else{
            return view('detail',compact('data'));
        }
    }
    public function deleteCompare(){
        $user=Auth::user();
        $compare=compare::where('user_id',$user->id)->get();
        foreach($compare as $data){
            $data->delete();
        }
        return redirect('home');
    }

    public function search(request $request){
        $search=$request->get('search');
        $data=product::where('name',$search)->first();
        // return redirect('home');
        return view('searchView',compact('data','search'));
    }

    public function dashboarddetail($id){
        $data=product::find($id);
        $count=0;
        $total=0;
        foreach($data->rate as $rate_value){
            $total=$total+$rate_value->rate;
            $count=$count+1;
        }
        if($count>0){
            $rating=$total/$count;
            return view('admin/detail',compact('data','rating'));
        }
        else{
            return view('admin/detail',compact('data'));
        }
    }

    public function bid(){
        $data=bid::all()->sortByDesc('id');
        return view('bidProducts',compact('data'));
    }

    public function bidDetail(request $request){
        $bid_id=$request->get('product_id');
        $data=bid::find($bid_id);
        return view('bidDetail',compact('data'));
    }
}
