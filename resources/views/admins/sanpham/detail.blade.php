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
    <table class="table table-light table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên Sản Phẩm</th>
                <th scope="col">Ảnh Sản Phẩm</th>
                <th scope="col">Ngày Nhập</th>
                
                <th scope="col" colspan="2">Mô Tả</th>  
               
            </tr>
        </thead>
        <tbody>

                <tr>
                  
                    <th scope="row">{{ $sanpham->id }}</th>
                    <td>{{ $sanpham->ten_san_pham }}</td>
                    <td><img src="{{ Storage::url($sanpham->hinh_anh) }}" alt="" width="150px"></td>
                    <td>{{ $sanpham->ngay_nhap }}</td>
                    
                    <td scope="col"><textarea class="form-control" name="" id="" cols="80" rows="80" disabled>{{ $sanpham->mo_ta }}</textarea></td>
                    <th></th>
                </tr>

        </tbody>
    </table>



    
 
    <h3 class="text-center">BÌNH LUẬN SẢN PHẨM</h3>
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

                <tr>               
                    <th scope="row">{{$spbinhluan->ho_ten}}</th>
                    <td>{{$spbinhluan->noi_dung}}</td>
                    <td>{{$spbinhluan->thoi_gian}}</td>
                    <td>{{$spbinhluan->trang_thai == 0 ? "Đã Duyệt" : "Chưa Duyệt"}}</td>  
                </tr>

        </tbody>
    </table>
@endsection



@section('script')
@endsection
