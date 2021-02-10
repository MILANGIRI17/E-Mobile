@extends('layouts.app')

@section('content')
<div class="wrapper">


@if (\Session::has('success'))
<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{!! \Session::get('success') !!}</strong>
  </div>
@endif

@foreach($errors->all() as $error)
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $error }}</strong>
    </div>
@endforeach

<div class="table-responsive main_dash">
    <table class="table table-hover table-striped table-sm align-middle">
        <thead>
            <tr>
                <th scope="col">Products</th>
                <th scope="col">Brand</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $cart)
            <tr>
                <td class="table_content_item">
                    <img src="{{$cart->product->image}}" alt="">
                    <h5>{{$cart->product->name}}</h5>
                </td>
                <td class="table_content align-middle"> 
                    <h6>{{$cart->product->brand}}</h6>
                </td>
                <td class="table_content align-middle"> 
                    <h6>{{$cart->quantity}}</h6>
                </td>
                <td class="table_content align-middle"> 
                    <span><h6>Rs. {{$cart->product->price*$cart->quantity}}</h6></span>
                </td>
                <td class="align-middle">
                    <span> <a href="" onclick="event.preventDefault(); document.getElementById('{{$cart->id}}').submit();">
                        <i class="fas fa-times"></i></span>
                    </a>
                    <form id="{{$cart->id}}" action="{{route('cart.destroy',$cart->id)}}" method="post" class="hidden">
                        @csrf

                        @method('DELETE')
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    @if (!empty($cart))
        <button type="button" class="btn btn-secondary btn-sm" onclick="myFunction()" id="order_button">Order Now</button>
    {{-- <button type="button" class="btn btn-secondary btn-sm" onclick="myFunction()" id="order_button">Order Now</button> --}}

<div class="order_data" id="order_data">
    <div class="form_group order_form">
        <form action="{{route('order.store')}}" method="POST">
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" value="{{$user->name}}" name="name">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Number</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" value="{{$user->phone_no}}" name="number">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" value="{{$user->address}}" name="address">
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary btn-sm">submit</button>
        </form>
    </div>

    <div class="show_order_data">
        <table class="table table-sm table-striped table-dark">
            <thead>
                <th>Product</th>
                <th>Price</th>
            </thead>
            <?php
                $G_total=0;
            ?>
            @foreach ($data as $cart)
                <tr>
                    <td>{{$cart->product->name}}</td>
                    <td>{{$cart->product->price*$cart->quantity}}</td>
                </tr>
                <?php
                    $G_total=$G_total+$cart->product->price*$cart->quantity;
                ?>
            @endforeach
            <tr>
                <td>Grand Total</td>
                <td>{{$G_total}}</td>
            </tr>
        </table>
    </div>
</div>
@else
<h4>Nothing on Cart</h4>
@endif

</div>

<script>
    function myFunction() {
      document.getElementById("order_data").style.display= 'flex';
      document.getElementById("order_button").style.display= 'none';
    }
</script>
@endsection