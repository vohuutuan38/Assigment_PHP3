@extends('layouts.admin')

@section('title')
    ADMIN
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admins/css/style.css') }}">
@endsection


@section('content')
    <h3 class=" text-center mb-0">ĐÂY LÀ TRANG CHI TIẾT SẢN PHẨM</h3>
    
    @if (session('thongbao'))
        <div class="alert alert-success">
            {{ session('thongbao') }}
        </div>
    @endif
    <h3 class="text-center">CHI TIẾT SẢN PHẨM </h3>
    <div class="btn_dm mb-3">
        <a href="{{ route('sanpham.index') }}"><button>Trở Lại</button></a>
    </div>
   

    <form class="row g-3">
       
        <div class="col-md-12">
            <label for="colFormLabelLg" class=" col-form-label col-form-label-lg">Tên sản phẩm</label>
            
              <input type="text" class="form-control " id="colFormLabelLg" value="{{ $sanpham->ten_san_pham }}" disabled>
            
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class=" col-form-label col-form-label-lg">Số lượng</label>
            <input type="number" class="form-control" value="{{ $sanpham->so_luong }}" disabled>
          </div>
          <div class="col-md-6">
            <label for="inputPassword4" class=" col-form-label col-form-label-lg">Ngày Nhập</label>
            <input type="number" class="form-control" value="{{ $sanpham->so_luong }}" disabled>
          </div>
        <div class="col-md-12">
            <label for="inputPassword4" class="col-form-label col-form-label-lg">Ảnh Sản Phẩm</label>         
                <img src="{{Storage::url($sanpham->hinh_anh)}}" alt="" class="d-block" width="200px">          
          </div>
          <div class="col-12">
            <label for="inputAddress" class="col-form-label col-form-label-lg">Album ảnh sản phẩm</label>
            <div class="form-control">
                 @foreach ($hinhAnhSanPham as $index => $hinhAnh)
                 <img src="{{Storage::url($hinhAnh)}}" id="preview_{{$index}}"  alt="hình ảnh sản phẩm"
                     style="width:150px; " class="me-3">
               
                 @endforeach
          </div>
          </div>
          <div class="col-12">
            <label for="inputAddress" class="col-form-label col-form-label-lg">Mô Tả</label>
            <textarea style="height: 300px" class="form-control h-100" disabled>{{$sanpham->mo_ta}}</textarea>
          </div>
       
      </form>


 
    <h3 class="text-center mt-5">BÌNH LUẬN SẢN PHẨM</h3>
    <table class="table table-light table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Người DÙng</th>
                <th scope="col">Nội Dung</th>
                <th scope="col">Thời Gian</th>
                <th scope="col">Trạng Thái</th>
            </tr>
        </thead>
        <tbody>
            @if ($spbinhluan)
            @foreach ($spbinhluan as $item)
            <tr>               
                <th scope="row">{{$item->ho_ten}}</th>
                <td>{{$item->noi_dung}}</td>
                <td>{{$item->thoi_gian}}</td>
                <td>{{$item->trang_thai == 0 ? "Đã Duyệt" : "Chưa Duyệt"}}</td>  
            </tr>
            @endforeach
           
            @endif
               

        </tbody>
    </table>
@endsection



@section('script')

@endsection
