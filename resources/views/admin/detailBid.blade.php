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
            <th scope="col">Product</th>
            <th scope="col">User</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $product)
        <tr>
            <td class="table_content_item">
                <img src="{{$product->bid->image}}" alt="">
                <h5>{{$product->bid->name}}</h5>
            </td>
            <td class="table_content align-middle"> 
                <h6>{{$product->user->name}}</h6>
            </td>
            <td class="table_content align-middle"> 
                <h6>Rs. {{$product->bid_price}}</h6>
            </td>
            <td class="table_content align-middle">
                {{-- <button type="button" class=" btn btn-sm btn-dark" onclick="event.preventDefault(); document.getElementById('{{$product->id}}').submit();">
                    sell
                </button> --}}
                <a href="{{route('bidSell',$product->id)}}" class="btn btn-sm btn-dark">Sell</a>
                {{-- <form id="{{$product->id}}" action="{{route('bid.destroy',$product->id)}}" method="post" class="hidden">
                    @csrf

                    @method('DELETE')
                </form> --}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection