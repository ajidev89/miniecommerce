@extends('layouts.layouts')
@section('content')
<h2 class="display-4 p-3 text-center">Cart</h2>
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
                <tr>
                    <th scope="row text-danger">1</th>
                    <td>John</td>
                    <td>Doe</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Tnisha</td>
                    <td>Happy</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Tasi</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col">Total:</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
        </table>

</section>
@endsection