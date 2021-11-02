@extends("layouts.layouts")

@section('content')
  <section class="container-fluid">
  <div class="container">
    <h2 class="p-3 text-center">Our menu</h2>
    <div class="row">
	@foreach($products as $product)
	  <div class="col-sm-3 col-6 pb-3 ">
			<div class="card"> 
		<img src="{{ $product->imgsrc }}" class="card-img-top" alt="...">
			<div class="card-body">
		<h5 class="card-title"><a href="/product/{{ $product->url }}"class="text-danger">{{ $product->name }}</a></h5>
		<p class="card-text">
		<s class="text-muted">&#8358;{{ $product->regular }}</s>
		&#8358;{{ $product->sale }}
		</p>
		<form action="/checkout/cookie" method='post'>
		@csrf
		 <input type="hidden" name="id" value="{{ $product->id }}">
		 <input type="hidden" name="qty" value="1">
		 <input type="submit" value="Buy now" class="btn btn-dark text-white sm-text"> 
		</form>
		</div>
		</div>
	  </div>
	  @endforeach 
</section>
@endsection