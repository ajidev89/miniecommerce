<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //

    public function show(){
       //show all products in homepage
      $products = Product::all();
        return view('public.index',[
            'products' => $products,
            ]);

    }

    public function details($id){
            //show product on one page
           $details = Product::where('url',$id)->firstorFail();

       return view('public.details',['details' => $details]);
  
      }

      public function edit($url){
        //edit product on one page
       $details = Product::where('url',$url)->firstorFail();

     return view('admin.edit',['details' => $details]);

    }
    public function update(Request $request){
        $request->validate([
            'name' => 'required',
            'regular' => 'required|numeric|gt:sale',
            'sale' => 'required|numeric|lte:regular',
            'desc' => 'required|min:4|max:255'
        ]);
       $url = request('url');
       $update = Product::where('url',$url)->firstorFail();
       $updateUrl = (str_replace(' ','-',strtolower(request('name'))));
       $update->name = request('name');
       $update->url =  $updateUrl;
       $update->regular = request('regular');
       $update->sale = request('sale');
       $update->desc = request('desc');
       
       $update->save();
       
    return redirect('/product/'.$updateUrl);

    }

      public function new(){
        //view addproducts
       return view('admin.create');

    }
    
    public function store(Request $request){
        //store products
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:,jpeg,jpg,png,gif|max:10000',
            'regular' => 'required|numeric|gt:sale',
            'sale' => 'required|numeric|lte:regular',
            'desc' => 'required|min:4|max:255'
        ]);

        $path = $request->file('image')->store('img/products','upload');
        //$path = Storage::putFile('img/products',$request->file('image'));
        $url = (str_replace(' ','-',strtolower(request('name'))));
        $name = request('name');
        $regular = request('regular');
        $sale = request('sale');
        $desc = request('desc');
      
         $product = New Product();
         $product->name = $name;
         $product->imgsrc = $path;
         $product->url = $url;
         $product->regular = $regular;
         $product->sale = $sale;
         $product->desc = $desc;

         $product->save();
        
       return redirect('/');

   }
}
