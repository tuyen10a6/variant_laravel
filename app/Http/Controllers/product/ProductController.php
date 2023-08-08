<?php

namespace App\Http\Controllers\product;
use App\Http\Controllers\Controller;
use App\Models\brand\Brand;
use App\Models\category\Category;
use App\Models\product\Product;
use App\Models\product_image\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use function PHPUnit\Framework\returnArgument;


class ProductController extends Controller
{
    /**
     * ProductController constructor.
     */

    public function __construct()
    {

    }

    public function index()
    {

        $products = Product::with('category', 'brand', 'product_image')->where("status", Product::PRODUCT_STATUS_IS_ACTIVE)->paginate(10);



        return view('admin.product.index', compact('products'));
    }

    /**
     * @param $id
     */

     public function  show($id)
     {
         $product = Product::with('category', 'brand')->find($id);

         return view('admin.product.detail', compact('product'));
     }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public  function create()
    {
        $brands = Brand::all();

        $categories = Category::all();

        return view('admin.product.create', compact('brands','categories'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:products',
            'price' => 'required',
            'status' => 'required',
            'path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

       $input = $request->all();

       $input["sku"] = time();

       $input["slug"] = Str::slug($input["name"], "-");

        $product = Product::create($input);

        $fileName = time().$request->file('path')->getClientOriginalName();

        $path = $request->file('path')->storeAs('images', $fileName, 'public');

        $input["path"] = '/storage/'.$path;


        ProductImage::create([
            'product_id' => $product->id,
            'name' =>  $request->file('path')->getClientOriginalName(),
            'path' => $input['path'],
        ]);

       if($input)
       {
           return redirect()->route('admin.product.index')->with('success', 'Thêm sản phẩm thành công');
       }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
     */

    public function show_update($id)
    {
        $product = Product::find($id);

        $categories = Category::all();

        $brands = Brand::all();

        return view('admin.product.update', compact('product', 'categories', 'brands'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Request $request, $id)
    {
        $product = Product::find($id);

         $product->name = $request->input('name');
         $product->category_id = $request->input('category_id');
         $product->brand_id = $request->input('brand_id');
         $product->price = $request->input('price');
         $product->slug = Str::slug($request->input('name'), '-');
         $product->promotion_price = $request->input('promotion_price');
         $product->qty = $request->input('qty');
         $product->status = $request->input('status');
         $product->short_description = $request->input('short_description');

         $product_image = ProductImage::where('product_id', $id)->first();


        if ($request->hasFile('path')) {

            $fileName = time().$request->file('path')->getClientOriginalName();

            $path = $request->file('path')->storeAs('images', $fileName, 'public');

            $product_image->path = '/storage/'. $path;

            $product_image->name = $fileName;

            $product_image->save();

        }

        if ($product->save()) {
            return redirect()->route('admin.product.index')->with('success', 'Sản phẩm đã được cập nhật thành công');
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove($id)
    {
        $product = Product::find($id);

        if($product)
        {
            $product->delete();

            return redirect()->route('admin.product.index')->with('success', 'Xóa sản phẩm thành công');
        }
    }

}
