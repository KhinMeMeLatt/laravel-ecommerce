<?php

use Carbon\Carbon;

function presentPrice($price)
{
    return '$'.$price / 100;
}

function presentDate($date)
{
    return Carbon::parse($date)->format('M d, Y');
}

function setActiveCategory($category, $output = 'active')
{
    return request()->category == $category ? $output : '';
}

function productImage($path)
{
    return $path && file_exists('storage/'.$path)  ? asset('storage/'.$path) : asset('img/not-found.jpg');
}

function getNumbers() 
{
    $tax = config('cart.tax') / 100; // tax value is come from cart package (cart.php)
    $discount = session()->get('coupon')['discount'] ?? 0;
    $code = session()->get('coupon')['name'] ?? null;
    $newSubtotal = Cart::subtotal() - $discount;
    if($newSubtotal < 0) {
        $newSubtotal = 0;
    }
    $newTax = $newSubtotal * $tax;
    $newTotal = $newSubtotal + $newTax;
    
    return collect([
        'tax' => $tax,
        'discount' => $discount, 
        'newSubtotal' => $newSubtotal,
        'newTax' => $newTax,
        'newTotal' => $newTotal,
    ]);
}

function getStockLevel($quantity)
{
    if($quantity > setting('site.stock_threshold')){
        $stockLevel = '<div class="badge badge-success">In Stock</div>';
    } elseif ($quantity <= setting('site.stock_threshold') && $quantity > 0) {
        $stockLevel = '<div class="badge badge-warning">Low Stock</div>';
    } else {
        $stockLevel = '<div class="badge badge-danger">Not available</div>';
    }

    return $stockLevel;
}