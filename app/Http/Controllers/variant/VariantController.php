<?php

namespace App\Http\Controllers\variant;
use App\Http\Controllers\Controller;
use App\Models\attribute\Attribute;
use App\Models\attribute_value\AttributeValue;
use App\Models\product\Product;
use App\Models\variant\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Symfony\Component\Console\Input\Input;

class VariantController extends Controller
{

    /**
     * @param $id
     * @return void
     */
      public function getVariantByProduct($id)
      {
          $product = Product::find($id);

          $variants = Variant::where('product_id', $id)->get();

          return view('admin.variant.index', compact('variants', 'product'));
      }

    /**
     * @return void
     */
      public function create($id)
      {
          $product = Product::where('id', $id)->first();

          $attributes = Attribute::all();

          return view('admin.variant.create', compact('product', 'attributes'));
      }

    /**
     * @param Request $request
     * @param $attributeId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAttributeValues(Request $request, $attributeId)
    {
        $attribute = Attribute::find($attributeId);

        $attributeValues = $attribute->attributevals;

        return response()->json($attributeValues);
    }

    public function store(Request $request)
    {
        $variant = new Variant();

        // Get the selected attribute names
        $attributeValue1 = $request->input('attribute-value-select-1');
        $attributeValue2 = $request->input('attribute-value-select-2');

        // Extract the second part of the value
        $attributeValue1 = $attributeValue1 === 'no_select' ? '' : explode("-", $attributeValue1)[1] ?? '';
        $attributeValue2 = $attributeValue2 === 'no_select' ? '' : explode("-", $attributeValue2)[1] ?? '';

        // Concatenate the attribute values into the variant's name
        $variantName = $request->input('name');
        $variantName .= $attributeValue1 ? ' ' . $attributeValue1 : '';
        $variantName .= $attributeValue2 ? ' ' . $attributeValue2 : '';

        $variant->name = $variantName;
        $variant->slug = Str::slug($variantName, '-');
        $variant->product_id = $request->input('product_id');
        $variant->sku = time();
        $variant->price = $request->input('price');
        $variant->qty = $request->input('qty');

        // Save the image file
        if ($request->hasFile('image')) {
            $fileName = time() . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('images', $fileName, 'public');
            $variant->image = '/storage/' . $path;
        }

        $variant->save();
        Session::flash('flash_message', 'Service successfully added!');
        return redirect()->route('admin.product.index')->with('success', 'Service Successfully Added');
    }
//    public function  store(Request $request)
//    {
//
//       $variant = new Variant();
//
//       $variant->name = $request->input('name').' '.explode("-", $request->input('attribute-value-select-1')).' '.explode("-", $request->input('attribute-value-select-2'));
//
//       $variant->slug = Str::slug($request->name, '-');
//
//       $variant->product_id = $request->input('product_id');
//
//       $variant->sku = time();
//
//       $variant->price = $request->input('price');
//
//       $variant->qty = $request->input('qty');
//
//        $fileName = time().$request->file('image')->getClientOriginalName();
//
//        $path = $request->file('image')->storeAs('images', $fileName, 'public');
//
//        $variant["image"] = '/storage/'.$path;
//
//
//        $variant ->save();
//        Session::flash('flash_message', 'Service successfully added!');
//        return redirect()->route('admin.product.index')->with('success', 'Service Successfully Added');
//
//
//    }

}
