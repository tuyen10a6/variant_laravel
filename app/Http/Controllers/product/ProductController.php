<?php

namespace App\Http\Controllers\product;
use App\Http\Controllers\Controller;
use App\Models\brand\Brand;
use App\Models\category\Category;
use App\Models\product\Product;
use http\Env\Request;

class ProductController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {

        $products = Product::with('category','brand')->where("status", Product::PRODUCT_STATUS_IS_ACTIVE)->paginate(2);

        return view('admin.product.index', compact('products'));
    }

    public function  show($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $product = Product::with('category','brand')->find($id);

        return view('admin.product.detail', compact('product'));

    }
    public  function create()
    {
        $brands = Brand::all();

        $categories = Category::all();

        return view('admin.product.create', compact('brands','categories'));
    }

    public function store(Request $request)
    {
        
    }





}
