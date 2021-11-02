@extends('layouts.layouts')
@section('content')
<section class="container ">
    <div class="row p-3">
            <div class="col-sm-6 p-2">
                <div class="text-center sm-text-center">
                <img src="../{{ $details->imgsrc }}" style="width:100%;" class="rounded" alt="...">
                </div>
            </div>
            <div class="col-sm-6 p-2">
                <p class="pt-5"></p>
                <h1>{{ $details->name }}</h1>
                    <h4>
                        {{ $details->desc }}<br>
                        <s class="text-muted">&#8358;{{ $details->regular }}</s>
                        &#8358;{{ $details->sale }}
                    </h4>
                    <form action="/checkout/cookie" method='post'>
                    <div class="row">
                        <div class="col">
                        @csrf
                             <input type="hidden" name="id" value="{{ $details->id }}">
                             <input type="number" placeholder="Qty" value="1" name="qty" min="1" max="5" style="width:50px; height:35px;">
                             <input type="submit" value="Buy now" class="btn btn-dark text-white sm-text"> 
                        </div>
                    </div>
                    </form>
                   @guest
                   @else
                     <a href="/admin/edit-product/{{ $details->url }}"class="btn btn-dark text-white sm-text">Edit</a>
                   @endguest
            </div>
    </div>        
</section>

@endsection