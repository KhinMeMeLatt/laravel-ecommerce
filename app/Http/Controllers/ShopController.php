<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->category){
            $products = Product::with('categories')->whereHas('categories', function($query) {
                $query->where('slug', request()->category);
            });
            $categories = Category::all();
            $categoryName = $categories->where('slug', request()->category)->first()->name;
        }else {
            $products = Product::take(12);
            $categories = Category::all();
            $categoryName = 'Featured';
        }

        if(request()->sort == 'low_high') {
            $products =  $products->orderBy('price')->paginate(9);
        } elseif(request()->sort == 'high_low') {
            $products =  $products->orderBy('price', 'desc')->paginate(9);
        } else {
            $products = $products->paginate(9);
        }
        
        return view('shop')->with([
            'products' => $products,
            'categories' => $categories,
            'categoryName' => $categoryName,
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $mightAlsoLike = Product::where('slug', '!=', $slug)->mightAlsoLike()->get();

        return view('product')->with([
            'product' => $product,
            'mightAlsoLike' => $mightAlsoLike
            ]);
    }
}
