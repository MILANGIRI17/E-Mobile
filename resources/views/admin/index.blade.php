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
            <th scope="col">Brand</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
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
                <h6>{{$product->brand}}</h6>
            </td>
            <td class="table_content align-middle"> 
                <h6>Rs. {{$product->price}}</h6>
            </td>
            <td class="table_content align-middle">
                <a href="{{route('product.edit',$product->id)}}" class="btn btn-dark btn-sm">Edit</a>
                <button type="button" class=" btn btn-sm btn-dark" onclick="event.preventDefault(); document.getElementById('{{$product->id}}').submit();">
                    Delete
                </button>
                
                <a href="{{url('/dashboard/detail/'.$product->id)}}" class="btn btn-dark btn-sm"> Detail</a>
                <button type="button" class=" btn btn-sm btn-dark" onclick="event.preventDefault(); document.getElementById('{{$product->name}}').submit();">
                    Add to bidding
                </button>

                <form id="{{$product->id}}" action="{{route('product.destroy',$product->id)}}" method="post" class="hidden">
                    @csrf

                    @method('DELETE')
                </form>
                <form id="{{$product->name}}" action="{{route('bid.store')}}" method="post" class="hidden">
                    @csrf
                    <input type="hidden" value="{{$product->id}}" name="product_id">
                    @method('post')
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection