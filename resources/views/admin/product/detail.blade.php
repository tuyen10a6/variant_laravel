@extends('admin.layout.layout')

@section('content')
    <h2 class="ml-3 mt-3 mb-3"> Chi tiết sản phẩm</h2>
           <div class="ml-3 mr-3">
               <div  class="form-group ">
                   <label for="usr">Tên sản phẩm:</label>
                   <input value="{{ $product->name }}" type="text" class="form-control" id="usr">
               </div>
               <div class="form-group">
                   <label for="pwd">sku:</label>
                   <input value="{{ $product->sku }}" type="text" class="form-control" id="pwd">
               </div>
               <div class="form-group">
                   <label for="pwd">Giá tiền:</label>
                   <input value="{{ number_format($product->price) }} đ" type="text" class="form-control" id="pwd">
               </div>
               <div class="form-group">
                   <label for="pwd">Loại sản phẩm:</label>
                   <input value="{{ $product->category->name }}" type="text" class="form-control" id="pwd">
               </div>
               <div class="form-group">
                   <label for="pwd">Mô tả ngắn:</label>
                  <textarea style="width: 100%; height:150px">
                  {{ $product->short_description }}
                  </textarea>
               </div>

               <div class="form-group">
                   <label for="pwd">slug:</label>
                   <input value="{{$product->slug}}" type="text" class="form-control" id="pwd">
               </div>
               <div class="form-group">
                   <label for="pwd">Giá tiền khuyến mãi:</label>
                   <input value="{{ $product->promotion_price }}" type="text" class="form-control" id="pwd">
               </div>
               <div class="form-group">
                   <label  for="pwd">Số lượng:</label>
                   <input value="{{ $product->qty }}" type="text" class="form-control" id="pwd">
               </div>
               <div class="form-group">
                   <label for="pwd">Trạng thái:</label>
                   <input value="{{ $product->status }}" type="text" class="form-control" id="pwd">
               </div>
               <div class="form-group">
                   <label for="pwd">Nhãn hiệu:</label>
                   <input value="{{ $product->brand->name }}" type="text" class="form-control" id="pwd">
               </div>
           </div>




@endsection
