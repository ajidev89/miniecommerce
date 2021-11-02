@extends('layouts.app')
@section('content')
<h2 class="text-center">Add product</h2>
<form action="/" method="post" id="add" enctype="multipart/form-data">
@csrf
    <div class="row">
        <div class="col-sm-6 form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control 
            @if($errors->first('name'))
            is-invalid
            @endif" name="name" autocomplete="name" value="" autofocus="autofocus" id="name">
           @if($errors->first('name'))
            <span role="alert" class="invalid-feedback"><strong>{{ $errors->first('name')}}</strong></span>
            @endif
        </div>
        <div class="col-sm-6 form-group">
            <label for="image">Product image</label>
            <div class="custom-file">
            <label class="custom-file-label" for="customFile">Choose file</label>
              <input type="file" name="image" placeholder="Choose file" class="custom-file-input 
            @if($errors->first('image'))
            is-invalid
            @endif" id="customFile">
            @if($errors->first('image'))
            <span role="alert" class="invalid-feedback"><strong>{{ $errors->first('image')}}</strong></span>
            @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 form-group">
            <label for="regular">Regular Price</label>
            <input type="text" class="form-control
            @if($errors->first('regular'))
            is-invalid
            @endif
            "name="regular" id="regular">
            @if($errors->first('regular'))
            <span role="alert" class="invalid-feedback"><strong>{{ $errors->first('regular')}}</strong></span>
            @endif
        </div>
        <div class="col-sm-6 form-group">
            <label for="sale">Sale Price</label>
            <input type="text" class="form-control 
            @if($errors->first('sale'))
            is-invalid
            @endif"name="sale" id="sale">
            @if($errors->first('sale'))
            <span role="alert" class="invalid-feedback"><strong>{{ $errors->first('sale')}}</strong></span>
            @endif
        </div>
    </div> 
    <div class="form-group">
            <label for="sale">Product Description</label>
            <textarea name="desc" class="form-control
            @if($errors->first('desc'))
            is-invalid
            @endif" id="desc" cols="30" rows="10"></textarea>
            @if($errors->first('desc'))
            <span role="alert" class="invalid-feedback"><strong>{{ $errors->first('desc')}}</strong></span>
            @endif
    </div>
    <button type="submit" class="btn btn-dark text-white sm-text" form="add" >Add product</button>
    </form>



@endsection