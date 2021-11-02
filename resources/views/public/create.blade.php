@extends("layouts.layouts")
@section('content')

<section class="container py-4">
<h2 class="display-4 p-3 text-center">Checkout</h2>
        @if(session('msg') != "" )
             <p class="alert alert-success my-2">{{ session('msg') }}</p>
        @endif
<form action="/checkout" id="checkout" method="post">
@csrf
    <input type="hidden" name="cart" value="{{ $cartJson }}">
    @if($errors->first('cart'))
     <p class="alert alert-danger my-2">{{ $errors->first('cart') }}</p>
     @endif
    <div class="row">
        <div class="col-sm-6 form-group">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control
            @if($errors->first('firstname'))
            is-invalid
            @endif" name="firstname" value="{{ old('firstname') }}" id="firstname">
            @if($errors->first('firstname'))
            <span role="alert" class="invalid-feedback"><strong>{{ $errors->first('firstname')}}</strong></span>
            @endif
        </div>
        <div class="col-sm-6 form-group">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control
            @if($errors->first('lastname'))
            is-invalid
            @endif" name="lastname" value="{{ old('lastname') }}" id="lastname">
            @if($errors->first('lastname'))
            <span role="alert" class="invalid-feedback"><strong>{{ $errors->first('lastname')}}</strong></span>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control
            @if($errors->first('email'))
            is-invalid
            @endif" name="email" id="email" value="{{ old('email') }}" aria-describedby="emailHelp">
            @if($errors->first('email'))
            <span role="alert" class="invalid-feedback"><strong>{{ $errors->first('email')}}</strong></span>
            @endif
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="col-sm-6 form-group">
            <label for="phone">Phone number</label>
            <input type="text" class="form-control
            @if($errors->first('phone'))
            is-invalid
            @endif" name="phone" value="{{ old('phone') }}" id="phone">
            @if($errors->first('phone'))
            <span role="alert" class="invalid-feedback"><strong>{{ $errors->first('phone')}}</strong></span>
            @endif
            <small id="emailHelp" class="form-text text-muted">We'll never share your Phone number with anyone else.</small>
        </div>
    </div> 
    <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control
            @if($errors->first('address'))
            is-invalid
            @endif" name="address" value="{{ old('address') }}" id="address">
            @if($errors->first('address'))
            <span role="alert" class="invalid-feedback"><strong>{{ $errors->first('address')}}</strong></span>
            @endif
    </div> 
    @if(!empty($carts))
    @php
    $sum = 0;
    foreach($carts as $cart){
    $price = $cart->quantity * $cart->price; 
    $sum = $sum + $price;
    }
    @endphp
    <input type="hidden" value="@php echo $sum @endphp" name="amount">
    @endif
   
    </form>
<h5 class="p-3 text-left">Cart</h5>
<!--{{var_dump($carts)}}-->
<section class="container bg-white">
        <table class="table table-striped table-responsive-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product</th>
                    <th scope="col">Quanity</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                
                    @if(!empty($carts))
                        @foreach($carts as $cart)
                        <tr> 
                                <td scope="row">
                                    <form action="/checkout/popcookie" id="form-{{ $loop->index }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product" value="{{ $loop->index }}">
                                    <button type="submit" form="form-{{ $loop->index }}" class="btn text-danger" > X</button>
                                    </form>
                                </td>
                                <td>{{ $cart->productName }}</td>
                                <td>{{ $cart->quantity }}</td>
                                <td>{{ $cart->price }}</td>
                        </tr>
                         @endforeach
                    @else
                    <td colspan="4"><span class="text-center">No products in the cart</span></td>
                    @endif   
                
            </tbody>
            <tfoot> 
                <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col">Total:</th>
                    @if(!empty($carts))
                        @php
                        $sum = 0;
                        foreach($carts as $cart){
                        $price = $cart->quantity * $cart->price; 
                        $sum = $sum + $price;
                        }
                        @endphp
                                        
                      <th scope="col">@php echo"&#8358;".number_format($sum) @endphp</th>
                    @else
                      <td scope="col">&#8358;0</td>
                    @endif
                </tr>
            </tfoot>
        </table>

</section>
    <button type="submit" form="checkout" class="btn btn-dark text-white sm-text" >Place order</button>
</section>
@endsection