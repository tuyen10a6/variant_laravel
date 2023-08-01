<?php

namespace App\Http\Controllers\attribute_value;
use App\Http\Controllers\Controller;
use App\Models\attribute\Attribute;
use App\Models\attribute_value\AttributeValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;


class AttributeValueController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
   public function index()
   {
       $attribute_value = AttributeValue::with('attributes')->get();

       return view('admin.attribute_value.index', compact('attribute_value'));
   }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */

    public function create()
    {
        $attribute = Attribute::all();

        return view('admin.attribute_value.create', compact('attribute'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'value' => 'required'
        ]);

        $attr = $request->all();

        $attr["code"] = Str::slug($attr["value"], "-");

        AttributeValue::create($attr);

        return redirect()->route('admin.attributive.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function show($id)
    {
        $attrval = AttributeValue::find($id);

        $attribute = Attribute::all();

        return view('admin.attribute_value.update', compact('attrval', 'attribute'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $attrvalue = AttributeValue::find($id);

        $attrvalue->attribute_id = $request->input('attribute_id');

        $attrvalue->value = $request->input('value');

        $attrvalue->code = Str::slug($request->input('value'), '-');

        $attrvalue->save();

        return redirect()->route('admin.attributive.index');

    }

    /**
     * @param $id
     * @return void
     */
    public function delete($id)
    {

        $attrval = AttributeValue::find($id);

        if($attrval)
        {
            $attrval->delete();

            return redirect()->route('admin.attributive.index');
        }

    }


}
