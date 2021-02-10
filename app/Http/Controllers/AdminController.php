<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\product;
use App\order;
use App\bidding;
use App\won_bid;
use App\bid;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>['create','store','login']]);
    }

    use AuthenticatesUsers;

    public function create(){
        return view('admin/login');
    }

    public function login(request $data){
        $credentials = $data->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $user= Auth::user();
            if($user->user_type=='Admin'){
                $data=product::all()->sortByDesc('id');
                return redirect('/dashboard')->with('data',$data);
            }
            return redirect('/admin')->with('error','Access denied');
        }
        else{
            return redirect('/admin')->with('error','Invalid Credentials.');
        }
    }

    public function store(request $data){
        $this->validate($data,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phonenumber' => ['required', 'integer'],
        ]);
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone_no' => $data['phonenumber'],
            'user_type' => 'Admin',
        ]);
        return redirect('/admin')->with('success','Registration completed.Please login to continue');
    }

    public function index(){
        $user=Auth::user();
        if(!empty($user)){
            if($user->user_type=='Admin'){
                $data=product::all()->sortByDesc('id');
                return view('admin/index',compact('data'));
            }
            else{
                return view('admin/login')->with('error','Please login to get access');
            }
        }
        else{
            return view('admin/login')->with('error','Please login to get access');
        }
    }

    public function order(){
        $data=order::all()->sortByDesc('id');
        return view('admin/viewOrder',compact('data'));
    }

    public function sellBid($id){
        $bid=bidding::find($id);
        $bidding=bid::find($bid->bid->id);
        $user_id=Auth::id();
        $won_bid=new won_bid([
            'name' => $bidding->name,
            'client_id'=>$bid->user_id,
            'brand' => $bidding->brand,
            'price' =>$bid->bid_price,
            'display' => $bidding->display,
            'processor' => $bidding->processor,
            'ram' => $bidding->ram,
            'storage' => $bidding->storage,
            'battery' => $bidding->battery,
            'front_camera' => $bidding->front_camera,
            'rear_camera' => $bidding->rear_camera,
            'os' => $bidding->os, 
            'image'=>$bidding->image,
        ]);
        $won_bid->save();
        // $bids=bidding::where('bid_id',$bidding->id)->get();
        // foreach($bids as $value){
        //     $value->delete();
        // }
        $bidding->delete();
        return redirect()->back();
    }

    public function showWinner(){
        $data=won_bid::all()->sortByDesc('id');
        return view('admin/showbid',compact('data'));
    }
}
