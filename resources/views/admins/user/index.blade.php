@extends('layouts.admin')

@section('title')
    ADMIN
@endsection
@section('css')
    <style>
        .main-panel {
            height: auto !important;
        }
    </style>
@endsection
@section('content')
    <h3 class="description">{{ $title }}</h3>
    <a href="{{ route('user.create') }}" class="btn btn-success">Thêm Admin</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Họ tên</th>
                <th scope="col">Email</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Giới tính</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Ngày sinh</th>
                <th scope="col">Chức vụ</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td><img src="storage/{{ $item->anh_dai_dien }}" alt="Ảnh đại diện" width="50" height="50"></td>
                    <td>{{ $item->ho_ten }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->so_dien_thoai }}</td>
                    <td>{{ $item->gioi_tinh }}</td>
                    <td>{{ $item->dia_chi }}</td>
                    <td>{{ $item->ngay_sinh }}</td>
                    <td>{{ $item->ten_chuc_vu }}</td>
                    <td>{{ $item->trang_thai == 1 ? 'Hoạt động' : 'Không hoạt động' }}</td>
                    <td>
                        <a href="{{ route('user.edit', $item->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('user.destroy', $item->id) }}"
                            onsubmit="return confirm('Bạn thực sự muốn xóa ?')" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
    </table>
@endsection



@section('script')
@endsection
