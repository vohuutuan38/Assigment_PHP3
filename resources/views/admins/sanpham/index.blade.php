@extends('layouts.admin')

@section('title')
    ADMIN
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admins/css/style.css') }}">
@endsection


@section('content')
    <h3 class=" text-center mb-0">ĐÂY LÀ TRANG SẢN PHẨM</h3>
    <div class="btn_dm mb-3">
        <a href="{{ route('sanpham.create') }}"><button>Thêm</button></a>
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
                <th scope="col">Tên Sản Phẩm</th>
                <th scope="col">Ảnh Sản Phẩm</th>
                <th scope="col">Giá Sản Phẩm</th>
                <th scope="col">Giá Khuyến Mãi</th>
                <th scope="col">Tên Danh Mục</th>
                <th scope="col">Trạng Thái</th>
                <th scope="col">Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sanpham as $sp)
                <tr>
                    <th scope="row">{{ $sp->id }}</th>
                    <td>{{ $sp->ten_san_pham }}</td>
                    <td><img src="{{ Storage::url($sp->hinh_anh) }}" alt="" width="100px"></td>
                    <td>{{ $sp->gia_san_pham }}</td>
                    <td>{{ $sp->gia_khuyen_mai }}</td>
                    <td>{{ $sp->ten_danh_muc }}</td>
                    <th>{{ $sp->trang_thai == 0 ? 'Còn Hàng' : 'Hết Hàng' }}</th>
                    <td>
                        <a href="{{ route('sanpham.edit', $sp->id) }}" class="btn btn-warning me-1 ">Sửa</a>
                        <a href="{{ route('sanpham.show', $sp->id) }}" class="btn btn-success me-1 ">Chi tiết</a>
                        <form action="{{ route('sanpham.destroy', $sp->id) }}"
                            onsubmit="return confirm('Bạn thực sự muốn xóa ?')" method="post" style="display: inline;">
                         
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
