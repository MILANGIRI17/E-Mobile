<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $data=product::all()->sortByDesc('id');
        return view('admin/index',compact('data'));
    }

    public function order(){
        return view('admin/viewOrder');
    }
}
