@extends('layouts.app')
@section('content')
<h2 class="text-center">Order for {{ $order->firstName}} {{ $order->lastName }}</h2>
<p class="text-center">{{ date('F j, Y g:i a',strtotime($order->created_at)) }}</p>
@if(session('msg') != "" )
             <p class="alert alert-success my-2">{{ session('msg') }}</p>
@endif
<h4 class="">Phone Number</h4>
<p>{{ $order->phone }}</p>
<h4 class="">Address</h4>
<p>{{ $order->address }} </p>
<div class="">
    <h4>Items bought</h4>
        @foreach( json_decode($order->products) as $product )
        <p>
        {{ $product->productName }} - {{ $product->quantity }} x {{ $product->price }}
        </p>   
        @endforeach
</div>
<h4 class="">Amount paid - &#8358;{{ $order->Amount }}</h4>
@if($order->status == "Pending")
<form action="/admin/orders/{{ $order->id }}" method="post">
@csrf
<input type="hidden" name="id" value="{{ $order->id }}" >
<input type="submit" class="btn btn-danger" value="Complete Order">
</form>
@endif
@endsection