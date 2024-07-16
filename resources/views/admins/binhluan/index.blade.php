@extends('layouts.admin')

@section('title')
    ADMIN
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('assets/admins/css/style.css') }}">
@endsection


@section('content')
<h3 class=" text-center mb-4">ĐÂY LÀ TRANG BÌNH LUẬN</h3>
@if (session('thongbao'))
        <div class="alert alert-success">
            {{ session('thongbao') }}
        </div>
    @endif
<table class="table table-light table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Họ Tên</th>
      <th scope="col">Tên Sản Phẩm</th>
      <th scope="col">Nội Dung</th>
      <th scope="col">Ngày Đăng</th>
      <th scope="col">Trạng Thái</th>
      <th scope="col">Hành Động</th>
    </tr>
  </thead>
  <tbody>
   @foreach ($list_binh_luan as $item)
   <tr>
    <th scope="row">{{$item->id}}</th>
    <td>{{$item->ho_ten}}</td>
    <td>{{$item->ten_san_pham}}</td>
    <td>{{$item->noi_dung}}</td>
    <td>{{$item->thoi_gian}}</td>
    <th>{{$item->trang_thai == 0 ? "Đã Duyệt" : "Chưa Duyệt"}}</th>
    <td>
    <form action="{{ route('binhluan.destroy', $item->id) }}" onsubmit="return confirm('Bạn thực sự muốn xóa ?')" method="post" style="display: inline;">
        <a href="{{ route('binhluan.edit', $item->id) }}" class="btn btn-warning">Cập Nhật</a>
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Xóa</button>
    </form>
    </td>
   @endforeach
   
   
   
  </tbody>
</table>
@endsection



@section('script')
@endsection