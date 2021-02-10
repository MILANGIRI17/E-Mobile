@extends('layouts.app')

@section('content')
<div class="wrapper">
    <h3 class="home_head">
        <b>All Products</b> 
    </h3>
    @if (\Session::has('success'))
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{!! \Session::get('success') !!}</strong>
      </div>
    @endif
    <div class="row main_dash">
        @foreach ($data as $product)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="featureitem">
                    <div class=featureitem_pic>
                        <img src="{{$product->image}}" alt="">
                    </div>
                    <div class="featureitem_text">
                        <h4>
                            <a href="{{url('/detail/'.$product->id)}}" >{{$product->name}}</a>
                        </h4>
                        <div class="show_cart">
                            <h5>
                               Rs: {{$product->price}}
                            </h5>
                            <a onclick="event.preventDefault(); document.getElementById('{{$product->id}}').submit();">
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                            <form id="{{$product->id}}" action="{{route('cart.store')}}" method="post" class="hidden">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                @method('Post')
                            </form>
                        </div>
                        <br>
                        <button type="button" class="btn btn-dark btn-sm" onclick="event.preventDefault(); document.getElementById('{{$product->name}}').submit();">
                            Add to compare
                        </button>
                        <form id="{{$product->name}}" action="{{route('compare.store')}}" method="post" class="hidden">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            @method('Post')
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        
    </div>
</div>
@endsection
