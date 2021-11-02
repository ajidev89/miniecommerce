@extends('layouts.app')
@section('content')
<h2 class="text-center">Orders</h2>
<section class="container-fluid bg-white">
        <table class="table table-striped table-responsive-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                    @if(empty($order))
                        @foreach($orders as $order)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td><a href="orders/{{ $order->id }}">{{ $order->firstName}} {{ $order->lastName }}</a></td>
                            <td>{{ $order->email }}</td>
                            <td>&#8358;{{ $order->Amount }}</td>
                            <td>{{ $order->status }}</td>
                        </tr>  
                        @endforeach
                    @else
                        <tr>
                        <td>All orders completed</td>
                        </tr>
                    @endif    
            </tbody>
            <thead>
             <tr>
                    <th scope="col">#</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Status</th>
                </tr>
              
            </thead>
        </table>
</section>


@endsection