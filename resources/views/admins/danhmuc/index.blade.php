@extends('layouts.admin')

@section('title')
    ADMIN
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('assets/admins/css/style.css') }}">
@endsection


@section('content')
<h3 class=" text-center mb-0">ĐÂY LÀ TRANG DANH MỤC</h3>
<div class="btn_dm mb-3">
  <a href="{{route('danhmuc.create')}}"><button>Thêm</button></a>
</div>
@if (session('thongbao'))
        <div class="alert alert-success">
            {{ session('thongbao') }}
        </div>
    @endif
<table class="table table-light table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Hình Ảnh</th>
      <th scope="col">Tên Danh Mục</th>
      <th scope="col">Mô Tả</th>
      <th scope="col">Hành Động</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($danhmuc as $dm)

    <tr>
      <th scope="row">{{ $dm->id }}</th>
      <td><img src="{{ $dm->hinh_anh }}" alt=""></td>
      <td>{{ $dm->ten_danh_muc }}</td>
      <td>{{ $dm->mo_ta }}</td>
      <td>
        <form action="{{ route('danhmuc.destroy', $dm->id) }}" onsubmit="return confirm('Bạn thực sự muốn xóa ?')" method="post" style="display: inline;">
            <a href="{{ route('danhmuc.edit', $dm->id) }}" class="btn btn-warning">Sửa</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Xóa</button>
        </form>
      </td>
    </tr>
    @endforeach
   
  </tbody>
</table>
@endsection



@section('script')
@endsection