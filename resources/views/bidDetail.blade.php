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
            <br>
        </div>
    </div>
    <div class="form-group rate">
        <form action="{{route('bidding.store')}}" method="POST">
            @csrf
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Place your bid</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" value="" name="bid">
                </div>
            </div>
            <input type="hidden" name="bid_id" value="{{$data->id}}">
            <br>
            <button type="submit" class="btn btn-sm btn-success rate_btn">Bid</button>
        </form>
    </div>
</div>

@endsection
