@extends('admin.layout.layout')

@section('content')
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên biến thể</th>
            <th scope="col">Giá tiền</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Thao tác</th>
        </tr>
        </thead>
        <tbody>
        @foreach()
            <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
