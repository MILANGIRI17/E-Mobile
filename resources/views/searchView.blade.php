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

    <h3 style="margin-bottom: 20px">Search for Product {{$search}} </h3>
    @if (!empty($data))
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
        </form>
        </div>
       
    @else
        <h5 style="margin-top: 20px">Data not found</h5>
    @endif
</div>

@endsection