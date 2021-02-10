@extends('admin/header')
@section('content')
@foreach($errors->all() as $error)
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $error }}</strong>
        </div>
    @endforeach
    @if (\Session::has('success'))
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{!! \Session::get('success') !!}</strong>
      </div>
    @endif
    @if (\Session::has('error'))
    <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{!! \Session::get('error') !!}</strong>
      </div>
    @endif
<div class="table-responsive main_dash">
<table class="table table-hover table-striped table-sm">
    <thead>
        <tr>
            <th scope="col">Products</th>
            <th scope="col">Winner</th>
            <th scope="col">Email</th>
            <th scope="col">Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $product)
        <tr>
            <td class="table_content_item">
                <img src="{{$product->image}}" alt="">
                <h5>{{$product->name}}</h5>
            </td>
            <td class="table_content align-middle"> 
                <h6>{{$product->client->name}}</h6>
            </td>
            <td class="table_content align-middle"> 
                <h6>{{$product->client->email}}</h6>
            </td>
            <td class="table_content align-middle"> 
                <h6>Rs. {{$product->price}}</h6>
            </td> 
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection