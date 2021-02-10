@extends('admin/header')
@section('content')

@foreach($errors->all() as $error)
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $error }}</strong>
    </div>
@endforeach
    <div class="form-group add_product">
        <form action="{{route('product.update',$product->id)}}" method="POST">
            @csrf
            {{ method_field('PUT') }}
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" value="{{$product->name}}" name="name">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Brand</label>
                <div class="col-sm-10">
                    <select name="brand" id="" class="form-control">
                        <option value="{{$product->brand}}">{{$product->brand}}</option>
                        <option value="Samsung">Samsung</option>
                        <option value="Iphone">Iphone</option>
                        <option value="Xiaomi">Xiaomi</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$product->price}}" name="price">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Display</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$product->display}}" name="display">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Processsor</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$product->processor}}" name="processor">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Ram</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$product->ram}}" name="ram">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Storage</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$product->storage}}" name="storage">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Front Camera</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$product->front_camera}}" name="front_camera">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Rear Camera</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$product->rear_camera}}" name="rear_camera">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Operating System</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$product->os}}" name="os">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Battery</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$product->battery}}" name="battery">
                </div>
            </div>
            <br>
        <button type="submit" class="btn btn-success btn-sm btn-block">Edit</button>
        </form>
    </div>
@endsection()