@extends('admin.layout.layout')

@section('content')
    <h2 class="ml-3 mt-3">Thêm biến thể</h2>
    <form enctype="multipart/form-data" class="ml-3" action="{{route('create.variant')}}" method="post">
        @csrf
        <div class="ml-3 mr-3">
            <div  class="form-group ">
                <label for="usr">Tên sản phẩm:</label>
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input  disabled   value="{{$product->name}}" type="text" class="form-control">
                <input  id="name"  name="name" value="{{$product->name}}" type="hidden" class="form-control">
            </div>
        </div>
        <div class="ml-3 mr-3">
            <div  class="form-group ">
                <label for="usr">Hình ảnh:</label>
                <input  required   name="image" type="file" id="image" class="form-control">
            </div>
        </div>
        <div  class="ml-3 mr-3">
            <div  class="form-group ">
                <label for="usr">Giá tiền:</label>
                <input required  type="text" class="form-control" id="price" name="price">
            </div>
        </div>
        <div class="ml-3 mr-3">
            <div  class="form-group ">
                <label for="usr">Số lượng:</label>
                <input required  type="text" class="form-control" id="qty" name="qty">
            </div>
        </div>
{{--        <div style="display: flex">--}}
{{--            <div style="width: 45%" class="ml-3 mr-3">--}}
{{--                <div  class="form-group ">--}}
{{--                    <label>Chọn thuộc tính 1</label>--}}
{{--                    <select id="attribute-select" class="form-select" aria-label="Default select example">--}}
{{--                        <option selected>No select</option>--}}
{{--                        @foreach($attributes as $item)--}}
{{--                            <option value="{{$item->id}}">{{$item->name}}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div style="width: 45%;" class="ml-3 mr-3">--}}
{{--                <div  class="form-group ">--}}
{{--                    <label>Chọn giá trị</label>--}}
{{--                    <select id="attribute-value-select" class="form-select" aria-label="Default select example">--}}

{{--                    </select>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div style="display: flex">
            <div style="width: 45%" class="ml-3 mr-3">
                <div class="form-group">
                    <label>Chọn thuộc tính 1</label>
                    <select id="attribute-select-1" class="form-select" aria-label="Default select example">
                        <option value="" selected>No select</option>
                        @foreach($attributes as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div style="width: 45%;" class="ml-3 mr-3">
                <div class="form-group">
                    <label>Chọn giá trị 1</label>
                    <select id="attribute-value-select-1" name ="attribute-value-select-1" class="form-select" aria-label="Default select example">
                        <!-- Options will be populated dynamically via JavaScript -->
                    </select>
                </div>
            </div>
        </div>

        <div style="display: flex">
            <div style="width: 45%" class="ml-3 mr-3">
                <div class="form-group">
                    <label>Chọn thuộc tính 2</label>

                    <select id="attribute-select-2" class="form-select" aria-label="Default select example">
                        <option value="" selected>No select</option>
                        @foreach($attributes as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div style="width: 45%;" class="ml-3 mr-3">
                <div class="form-group">
                    <label>Chọn giá trị 2</label>
                    <select id="attribute-value-select-2" name="attribute-value-select-2" class="form-select" aria-label="Default select example">

                    </select>
                </div>
            </div>
        </div>
        <button class="btn btn-danger ml-3" type="submit"> Thêm</button>
        <a id="ok" href="" class="btn btn-dark ml-3"> Quay lại </a>
    </form>



@endsection
