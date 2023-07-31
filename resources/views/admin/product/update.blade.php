@extends('admin.layout.layout')

@section('content')
        <h2 class="ml-3 mt-3 mb-3">Cập nhật thông tin sản phẩm</h2>
        <form action="{{route('admin.product.edit', $product->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="ml-3 mr-3">
                <div  class="form-group ">
                    <input value="{{ $product->id }}" type="hidden" class="form-control" name="id" id="id">
                </div>
                <div  class="form-group ">
                    <label for="usr">Tên sản phẩm:</label>
                    <input value="{{ $product->name }}" type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="pwd">Hình ảnh:</label>
                    <input  name="path" type="file" class="form-control" id="path">
                    <img  src="{{$product->product_image->path}}" id="product-img-tag" style="height:180px; margin-top:30px; margin-left:20px" />
                </div>
                <div class="form-group">
                    <input value="{{ $product->sku }}" type="hidden" class="form-control" id="sku" name="sku">
                </div>
                <div class="form-group">
                    <label for="pwd">Giá tiền:</label>
                    <input name="price" value="{{ $product->price }}" type="text" class="form-control" id="price">
                </div>

                <div class="form-group">
                    <label for="Name" class="form-label">Loại nhãn hiệu:</label>
                    <select  name ="brand_id"  class="form-select" aria-label="Default select example">
                        @foreach ($brands as $brand)
                            <option value="{{$brand->id}}" {{$product->brand_id == $brand->id ? 'selected' : ''}}>{{$brand->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="Name" class="form-label">Loại sản phẩm:</label>
                    <select  name ="category_id"  class="form-select" aria-label="Default select example">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{$product->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <label for="pwd">Mô tả ngắn:</label>
                    <textarea name="short_description" style="width: 100%; height:150px">
                  {{ $product->short_description }}
                  </textarea>
                </div>

                <div class="form-group">

                    <input value="{{$product->slug}}" name="slug" type="hidden" class="form-control" id="pwd">
                </div>
                <div class="form-group">
                    <label for="pwd">Giá tiền khuyến mãi:</label>
                    <input value="{{ $product->promotion_price }}" name="promotion_price" type="text" class="form-control" id="pwd">
                </div>
                <div class="form-group">
                    <label  for="pwd">Số lượng:</label>
                    <input value="{{ $product->qty }}" type="text" name="qty" class="form-control" id="pwd">
                </div>
                <div class="form-group">
                    <label for="pwd">Trạng thái:</label>
                    <input value="{{ $product->status }}" name="status" type="text" class="form-control" id="pwd">
                </div>

            </div>
            <button type="submit" class="btn btn-danger ml-lg-3">
                  Cập nhật
            </button>
          <a href="{{route('admin.product.index')}}" class="btn btn-dark ml-3"> Quay lại </a>
        </form>

    @endsection


