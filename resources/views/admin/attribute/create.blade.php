@extends('admin.layout.layout')

@section('content')
    <h2 class="ml-3 mt-3 mb-3">THÊM THUỘC TÍNH</h2>
    @if ($errors->any())
        <div style="max-width:450px" class="alert alert-danger mt-3 ml-3 mr-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form enctype="multipart/form-data" class="ml-3" action="{{route('admin.attribute.store')}}" method="post">
        @csrf
        <div class="ml-3 mr-3">
            <div  class="form-group ">
                <label for="usr">Tên thuộc tính:</label>
                <input required  type="text" class="form-control" id="name" name="name">
            </div>
        </div>
        <button class="btn btn-danger ml-3" type="submit"> Thêm</button>
        <a href="{{route('admin.attribute.index')}}" class="btn btn-dark ml-3"> Quay lại </a>
    </form>
@endsection


