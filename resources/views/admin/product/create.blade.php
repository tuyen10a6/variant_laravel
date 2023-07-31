@extends('admin.layout.layout')
@section('content')
        <h2 class="ml-3 mt-3 mb-3"> Thêm sản phẩm</h2>
        @if ($errors->any())
            <div style="max-width:450px" class="alert alert-danger mt-3 ml-3 mr-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form enctype="multipart/form-data" class="ml-3" action="{{route('admin.product.store')}}" method="post">
            @csrf
            <div class="ml-3 mr-3">
                <div  class="form-group ">
                    <label for="usr">Tên sản phẩm:</label>
                    <input required  type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="pwd">Hình ảnh:</label>
                    <input required  name="path" type="file" class="form-control" id="path">
                    <img  src="" id="product-img-tag" style="height:180px; margin-top:30px; margin-left:20px" />
                </div>
                <div class="form-group">

                    <input name="sku" type="hidden" class="form-control" id="pwd">
                </div>
                <div class="form-group">
                    <label for="pwd">Loại sản phẩm</label>
                    <select  class="form-control" name="category_id" id="category-id">

                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <label for="pwd">Nhãn hiệu</label>
                    <select class="form-control" name="brand_id" id="brand-id">
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="pwd">Mô tả ngắn:</label>
                   <textarea style="width: 100%; height: 150px" name="short_description">

                    </textarea>
                </div>
                <div class="form-group">

                    <input name="slug" type="hidden" class="form-control" id="slug">
                </div>

                <div class="form-group">
                    <label for="pwd">Giá tiền:</label>
                    <input required  name="price" type="text" class="form-control" id="pwd">
                </div>

                <div class="form-group">
                    <label for="pwd">Giá tiền khuyến mãi:</label>
                    <input  required name="promotion_price" type="text" class="form-control" id="pwd">
                </div>
                <div class="form-group">
                    <label   for="pwd">Số lượng:</label>
                    <input required name="qty" type="text" class="form-control" id="pwd">
                </div>
                <div class="form-group">
                    <select class="form-control" name="status" id="status">
                            <option value="1">Hoạt động</option>
                              <option value="2">Ngừng hoạt động</option>
                    </select>
                </div>
            </div>
            <button class="btn btn-danger ml-3" type="submit"> Thêm</button>
            <a href="{{route('admin.product.index')}}" class="btn btn-dark ml-3"> Quay lại </a>
        </form>
    @endsection


