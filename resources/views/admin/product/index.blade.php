@extends('admin.layout.layout')

@section('content')
<h3 class="ml-3 mt-3">BẢNG SẢN PHẨM</h3>
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Tên sản phẩm</th>
        <th scope="col">Giá tiền</th>
        <th scope="col">Loại sản phẩm</th>
        <th scope="col">Nhãn hiệu</th>
      </tr>
    </thead>
    <tbody>

    @foreach($products as $product)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ number_format($product->price) }} đ</td>
            <td>{{ $product->category->name }}</td>
            <td>{{ $product->brand->name }}</td>
        </tr>
    @endforeach

    </tbody>
  </table>
@endsection
