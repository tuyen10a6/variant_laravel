@extends('admin.layout.layout')

@section('content')
    <h2 class="ml-3 mt-3 mb-3">Cập nhật giá trị thuộc tính</h2>

    <form enctype="multipart/form-data" class="ml-3 mr-3" action="{{route('admin.attributive.update', $attrval->id)}}" method="post">
        @csrf
        @method('PUT')
        <div >
            <div  class="form-group ">
                <label> Chọn thuộc tính </label>
                <select name="attribute_id"  class="form-select">
                    @foreach($attribute as $item)
                        <option value="{{$item->id}}" {{$attrval->attribute_id == $item->id ? 'selected' : ''}}> {{$item->name}} </option>
                    @endforeach
                </select>
            </div>
            <div  class="form-group ">
                <label> Giá trị </label>
                <input value="{{$attrval->value}}" name="value" type="text" class="form-control" id="value">
            </div>
        </div>
        <button  type="submit" class="btn btn-danger">
            Cập nhật
        </button>

        <a href="{{route('admin.attributive.index')}}" class="btn btn-dark ml-3"> Quay lại </a>
    </form>


@endsection
