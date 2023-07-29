<?php

namespace App\Http\Controllers\product;
use App\Http\Controllers\Controller;
use App\Models\product\Product;

class ProductController extends Controller
{
    public function index()
    {

        $products = Product::with('category','brand')->where("status", Product::PRODUCT_STATUS_IS_ACTIVE)->paginate(2);

        return view('admin.product.index', compact('products'));
    }

    public function  show($id)
    {
        $product = Product::with('category','brand')->find($id);

        return view('admin.product.detail', compact('product'));

    }


}
