@extends('admin/header')
@section('content')

<div class="table-responsive admin_order">
    <table class="table table-hover table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">Products</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Client</th>
                <th scope="col">Number</th>
                <th scope="col">Address</th>
                <th scope="col">Delivery status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $orders)
            <tr>
                @foreach ($orders->order_detail as $order)
                   
                        <td>{{$order->product->name}}</td>
                   
                    
                        <td>{{$order->quantity}}</td>
                    
                   
                        <td>{{$order->total_price}}</td>
                   
                    
                        <td>{{$order->order->client->name}}</td>
                   
                   
                        <td>{{$order->order->client->phone_no}}</td>
                  
                   
                        <td>{{$order->order->client->address}}</td>
                   
                   
                        @if ($order->status=='No')
                            <td>{{$order->status}} <span style="margin-left: 10px"><button type="button" class="btn btn-primary btn-sm" onclick="event.preventDefault(); document.getElementById('{{$order->id}}').submit();">
                                <i class="fas fa-check"></i> Delivered
                            </button></span></td>
                            <form id="{{$order->id}}" action="{{route('order.update',$order->id)}}" method="post" class="hidden">
                                @csrf
        
                                @method('PUT')
                            </form>
                        @else
                            <td>{{$order->status}}</td>
                        @endif
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
@endsection()