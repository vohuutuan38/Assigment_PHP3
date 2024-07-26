@extends('layouts.admin')

@section('title')
    ADMIN
@endsection
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection




@section('content')
<h3 class="text-center mb-0">Trang thêm sản phẩm</h3>
<form action="{{ route('sanpham.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Tên Sản Phẩm</label>
        <input type="text" name="ten_san_pham" class="form-control" >
      </div>
      <div class="mb-3">
        <label class="form-label">Số Lượng</label>
        <input type="number" name="so_luong" class="form-control" >
      </div>
      <div class="mb-3">
        <label class="form-label">Giá Sản Phẩm</label>
        <input type="number" name="gia_san_pham" class="form-control" >
      </div>
      <div class="mb-3">
        <label class="form-label">Giá Khuyến Mãi</label>
        <input type="number" name="gia_khuyen_mai" class="form-control" >
      </div>
      <div class="mb-3">
        <label class="form-label">Ngày Nhập</label>
        <input type="date" name="ngay_nhap" class="form-control" >
      </div>
      <div class="input-group">
        <span class="input-group-text">Mô Tả</span>
        <textarea class="form-control" name="mo_ta" aria-label="With textarea"></textarea>
      </div>
      <div class="mb-3">
        <label for="">Danh Mục</label>
        <select  class="form-select" name="danh_muc_id" aria-label="Default select example">
   

            @foreach ($danhmuc as $dm)
            <option value="{{$dm->id}}">{{$dm->ten_danh_muc}}</option>
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
    </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary ">Submit</button>
      </div>
   
  </form>
@endsection



@section('script')
@endsection