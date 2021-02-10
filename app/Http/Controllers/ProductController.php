<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
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
        return view('admin/addproduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation=$request->validate([
            'image'=>'required|image',
            'name'=>'required',
            'brand'=>'required',
            'price'=>'required',
            'display'=>'required',
            'processor'=>'required',
            'ram'=>'required',
            'storage'=>'required',
            'battery'=>'required',
            'front_camera'=>'required',
            'rear_camera'=>'required',
            'os'=>'required',
        ]);
        $product=new product([
            'name' => $request->get('name'),
            'brand' => $request->get('brand'),
            'price' => $request->get('price'),
            'display' => $request->get('display'),
            'processor' => $request->get('processor'),
            'ram' => $request->get('ram'),
            'storage' => $request->get('storage'),
            'battery' => $request->get('battery'),
            'front_camera' => $request->get('front_camera'),
            'rear_camera' => $request->get('rear_camera'),
            'os' => $request->get('os'),            
        ]);
        $product->save(); 
        
        $allowedfileExtension=['pdf','jpg','png','jpeg','webp'];
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $check=in_array($extension,$allowedfileExtension);
        if($check)
        {
            Storage::disk('public')->put('/'.$product->id.'/'.$filename,  File::get($file));
            $product->image='/uploads/'.$product->id.'/'. $filename;
            $product->save();
        }

        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=product::find($id);
        return view('admin/edit',compact('product'));
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
        $validation=$request->validate([
            'name'=>'required',
            'brand'=>'required',
            'price'=>'required',
            'display'=>'required',
            'processor'=>'required',
            'ram'=>'required',
            'storage'=>'required',
            'battery'=>'required',
            'front_camera'=>'required',
            'rear_camera'=>'required',
            'os'=>'required',
        ]);
        $product=product::find($id);
        $product->name=$request->get('name');
        $product->brand=$request->get('brand');
        $product->price=$request->get('price');
        $product->display=$request->get('display');
        $product->processor=$request->get('processor');
        $product->ram=$request->get('ram');
        $product->storage=$request->get('storage');
        $product->battery=$request->get('battery');
        $product->front_camera=$request->get('front_camera');
        $product->rear_camera=$request->get('rear_camera');
        $product->os=$request->get('os');
        $product->save();
        return redirect('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=product::find($id);
        $product->delete();
        return redirect('dashboard')->with('success','product deleted');
    }
}
