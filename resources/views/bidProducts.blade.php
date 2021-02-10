@extends('layouts.app')

@section('content')
<div class="wrapper">
    <h3>
        <b>Bid Products</b> 
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
                           {{$product->name}}
                        </h4>
                        <div class="show_cart">
                            <h5>
                                {{$product->price}}
                            </h5>
                        </div>
                        <br>
                        <button type="button" class="btn btn-dark btn-sm" onclick="event.preventDefault(); document.getElementById('{{$product->id}}').submit();">
                            Bid this product
                        </button>
                        <form id="{{$product->id}}" action="/home/bid/detail" method="post" class="hidden">
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
