@extends('layouts.admin')

@section('title')
    ADMIN
@endsection
@section('css')
@endsection


@section('content')
<h3 class="text-center mb-0">Trang sửa sản phẩm</h3>
<form action="{{route('sanpham.update',$sanpham->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label" hidden>ID</label>
        <input type="text" name="id" value="{{$sanpham->id}}" class="form-control" hidden>
      </div>
    <div class="mb-3">
        <label class="form-label">Tên Sản Phẩm</label>
        <input type="text" name="ten_san_pham" value="{{$sanpham->ten_san_pham}}" class="form-control" >
      </div>
      <div class="mb-3">
        <label class="form-label">Số Lượng</label>
        <input type="number" name="so_luong" value="{{$sanpham->so_luong}}" class="form-control" >
      </div>
      <div class="mb-3">
        <label class="form-label">Giá Sản Phẩm</label>
        <input type="number" name="gia_san_pham" value="{{$sanpham->gia_san_pham}}" class="form-control" >
      </div>
      <div class="mb-3">
        <label class="form-label">Giá Khuyến Mãi</label>
        <input type="number" name="gia_khuyen_mai" value="{{$sanpham->gia_khuyen_mai}}" class="form-control" >
      </div>
      <div class="mb-3">
        <label class="form-label">Ngày Nhập</label>
        <input type="date" name="ngay_nhap" value="{{$sanpham->ngay_nhap}}" class="form-control" >
      </div>
      <div class="input-group">
        <span class="input-group-text">Mô Tả</span>
        <textarea class="form-control" name="mo_ta" aria-label="With textarea">{{$sanpham->mo_ta}}</textarea>
      </div>
      <div class="mb-3">
        <label for="">Danh Mục</label>
        <select  class="form-select" name="danh_muc_id" aria-label="Default select example">

            @foreach ($danhmuc as $dm)
            <option {{ $dm->id == $sanpham->danh_muc_id ? 'selected' : '' }} value="{{$dm->id}}">{{$dm->ten_danh_muc}}</option>
            @endforeach
    
          </select>
      </div>
      <div>
        <label>Trạng thái</label><br>
        <input type="radio" name="trang_thai" value="0" checked>
        <label class="form-check-label" for="admin_checkbox">Còn hàng</label>
        <input type="radio" name="trang_thai" value="1">
        <label class="form-check-label" for="admin_checkbox">Hết hàng</label>
    </div>
    <div class="mb-3">
      <label class="form-label">Ảnh Sản Phẩm</label>
      <input type="file" name="hinh_anh" class="form-control" >

      <img src="{{Storage::url($sanpham->hinh_anh)}}" alt="" width="100px">
     
    </div>
      
      <div class="text-center">
        <button type="submit" class="btn btn-primary ">Submit</button>
      </div>
   
  </form>
@endsection

@section('script')
@endsection