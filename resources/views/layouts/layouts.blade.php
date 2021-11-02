<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Mini-Commerce</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
       <!-- <link rel="stylesheet" href="/css/bootstrap.css">-->      
        <style>
            body {
                font-family: 'Lato';
            }
        </style>
    </head>
    <body class="bg-light">
<div class="container-fluid bg-white shadow-sm mb-5 fixed-top">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light ">
      <a class="navbar-brand text-center" href="{{ url('/') }}">Mini-commerce</a>
      <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav ml-lg-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('shop') }}">Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('checkout') }}">Checkout</a>
          </li>
          @guest
          @else
          <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('addProduct') }}">Add product</a>
                    <a class="dropdown-item" href="{{ route('orders') }}">Orders</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    <a class="" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                        @csrf
                    </form>
                </div>
            </li>
          <li class="nav-item">
           
          </li>
          @endguest
        </ul>
      </div>
    </nav>
  </div>
</div> 
<p class="p-4"> </p>
        @yield('content')
        
    <footer class='bg-white p-3'>
       <div class="text-center text-gray-600">Copyright@2020 Renov - All rights reserved</div>
   </footer>    
    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.js"></script>
    </body>
</html>
