@extends('admin.layout.layout')

@section('content')
    <h2 class="ml-3 mt-3">Thêm biến thể</h2>
    <form enctype="multipart/form-data" class="ml-3" action="" method="post">
        @csrf
        <div class="ml-3 mr-3">
            <div  class="form-group ">
                <label for="usr">Tên sản phẩm:</label>
                <input  disabled  value="{{$product->name}}" type="text" class="form-control">
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

{{--       --}}

        <div style="display: flex">
            <div style="width: 45%" class="ml-3 mr-3">
                <div class="form-group">
                    <label>Chọn thuộc tính</label>
                    @foreach($attributes as $item)
                        <div class="form-check">
                            <input class="form-check-input attribute-checkbox" type="checkbox" value="{{$item->id}}">
                            <label class="form-check-label">{{$item->name}}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div style="width: 45%;" class="ml-3 mr-3">
                <div class="form-group">
                    <label>Chọn giá trị</label>
                    <select id="attribute-value-select" class="form-select" multiple aria-label="Default select example">
                        <!-- Các lựa chọn sẽ được điền vào động qua JavaScript -->
                    </select>
                </div>
            </div>
        </div>




        <button class="btn btn-danger ml-3" type="submit"> Thêm</button>
        <a id="ok" href="" class="btn btn-dark ml-3"> Quay lại </a>
    </form>



@endsection
