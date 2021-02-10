@extends('layouts.app')

@section('content')

<div class="wrapper">
    <div class="compare_btn">
        <a href="/delete/compare" class="btn btn-dark btn-sm">
            Delete these product from compare
        </a>
    </div>
<hr>
<div class="compare">
    @foreach ($data as $compare)
        <div class="first">
            <div class="image">
                <img src="{{$compare->product->image}}" alt="">
            </div>
            <div class="description">
                <h3>{{$compare->product->name}}</h3>
            <h4>{{$compare->product->brand}}</h4>

            <h5>Details</h5>
            <ul>
                <li>
                 Price: Rs. {{$compare->product->price}}
                </li>
                <li>
                    Display: {{$compare->product->display}}
                </li>
                <li>
                    Processor: {{$compare->product->processor}}
                </li>
                <li>
                    Ram: {{$compare->product->ram}}
                </li>
                <li>
                    Storage: {{$compare->product->storage}}
                </li>
                <li>
                    Battery: {{$compare->product->battery}}
                </li>
                <li>
                    Front-Camera: {{$compare->product->front_camera}}
                </li> 
                <li>
                    Rear-Camera: {{$compare->product->rear_camera}}
                </li>
                <li>
                    Operating System: {{$compare->product->os}}
                </li>
            </ul>
            </div>
        </div>
    @endforeach
    
</div>


</div>

@endsection