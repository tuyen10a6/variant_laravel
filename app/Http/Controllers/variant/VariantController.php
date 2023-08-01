<?php

namespace App\Http\Controllers\variant;
use App\Http\Controllers\Controller;
use App\Models\attribute\Attribute;
use App\Models\attribute_value\AttributeValue;
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
          $variants = Variant::where('product_id', $id)->get();

          return view('admin.variant.index', compact('variants'));
      }


}
