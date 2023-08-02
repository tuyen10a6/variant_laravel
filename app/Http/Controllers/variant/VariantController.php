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
}
