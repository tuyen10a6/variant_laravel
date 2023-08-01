<?php

namespace App\Http\Controllers\attribute;
use App\Http\Controllers\Controller;
use App\Models\attribute\Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;


class AttributeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public  function  index()
    {
        $attributes = Attribute::all();

        return view('admin.attribute.index', compact('attributes'));
    }
    public function  create()
    {
        return view('admin.attribute.create');
    }
    /**
     * @param Request $request
     * @return void
     */
    public  function  store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:attributes',
        ]);

        $attribute = $request->all();

        $attribute["attribute_code"] = Str::slug($attribute["name"], "-");

        Attribute::create($attribute);

        return redirect()->route('admin.attribute.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public  function  show($id)
    {
        $attribute = Attribute::where('id', $id)->first();

        return view('admin.attribute.update', compact('attribute'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public  function  update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|unique:attributes',
        ]);

        $attribute = Attribute::where('id', $id)->first();

        $attribute->name = $request->input('name');

        $attribute->attribute_code = Str::slug($request->input('name'), '-');

        $attribute->save();

        return redirect()->route('admin.attribute.index');

    }

    /**
     * @param $id
     * @return void
     */
    public function remove($id)
    {
        $attribute = Attribute::find($id);

        if($attribute)
        {
           $attribute->delete();

            return redirect()->route('admin.attribute.index');
        }
    }

}
