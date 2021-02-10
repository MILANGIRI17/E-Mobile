@extends('layouts.app')

@section('content')

<div class="wrapper">
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
    <div class="detail">
        <div class="detail_image">
            <img src="{{$data->image}}" alt="">
        </div>
        <div class="detail_info">
            <h3>{{$data->name}}</h3>
            <h4>{{$data->brand}}</h4>

            <h5>Details</h5>
            <ul>
                <li>
                 Price: Rs. {{$data->price}}
                </li>
                <li>
                    Display: {{$data->display}}
                </li>
                <li>
                    Processor: {{$data->processor}}
                </li>
                <li>
                    Ram: {{$data->ram}}
                </li>
                <li>
                    Storage: {{$data->storage}}
                </li>
                <li>
                    Battery: {{$data->battery}}
                </li>
                <li>
                    Front-Camera: {{$data->front_camera}}
                </li> 
                <li>
                    Rear-Camera: {{$data->rear_camera}}
                </li>
                <li>
                    Operating System: {{$data->os}}
                </li>
            </ul>
            @if (!empty($rating))
                <span style="color: green"><h5>Rating: {{$rating}}/10</h5></span>
            @endif
            <br>
            <button type="button" class="btn btn-sm btn-primary" onclick="event.preventDefault(); document.getElementById('{{$data->id}}').submit();">
                <i class="fas fa-shopping-cart cart_color"></i> Add to Cart
            </button>
            <form id="{{$data->id}}" action="{{route('cart.store')}}" method="post" class="hidden">
                @csrf
                <input type="hidden" name="product_id" value="{{$data->id}}">
                @method('Post')
            </form>
        </div>
    </div>
    <div class="form-group rate">
        <form action="{{route('rate.store')}}" method="POST">
            @csrf
            <input type="text" class="form-control" id="rate" value="" name="rate" placeholder="value between 0-10" min="1" max="10">
            <input type="hidden" name="product_id" value="{{$data->id}}">
            <br>
            <button type="submit" class="btn btn-sm btn-success rate_btn">Rate</button>
        </form>
    </div>
</div>

@endsection