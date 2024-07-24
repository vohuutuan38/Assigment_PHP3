@extends('layouts.admin')

@section('title')
    ADMIN
@endsection
@section('css')
    <style>
        .main-panel {
            height: auto !important;
        }

        .alert {
            margin-left: 0px;
        }
    </style>
@endsection
@section('content')
    <h3 class="description">{{ $title }}</h3>
    <form method="POST" action="{{ route('user.store') }}" class="mb-5" enctype="multipart/form-data">
        {{-- sinh token bảo mật website tránh spawm --}}
        @csrf
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mb-2">
            <label>Chức vụ</label><br>
            <input type="radio" name="chuc_vu_id" value="1" checked>
            <label class="form-check-label" for="admin_checkbox">Admin</label>
        </div>
        <div class="form-group">
            <label>Họ tên</label>
            <input type="text" name="ho_ten" class="form-control" placeholder="Họ tên">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email">
        </div>
        <div class="form-group">
            <label>Số điện thoại</label>
            <input type="text" name="so_dien_thoai" class="form-control" placeholder="Số điện thoại">
        </div>
        <div>
            <label>Ảnh</label>
            <input type="file" name="anh_dai_dien" class="form-control">
        </div>
        <div class="form-group">
            <label>Địa chỉ</label>
            <input type="text" name="dia_chi" class="form-control" placeholder="Địa chỉ">
        </div>
        <div class="form-group">
            <label>Mật khẩu</label>
            <input type="text" name="password" class="form-control" placeholder="Mật khẩu">
        </div>
        <div class="form-group">
            <label>Ngày nhập</label>
            <input type="date" name="ngay_sinh" class="form-control" placeholder="Ngày nhập">
        </div>
        <div class="form-group">
            <label>Giới tính</label><br>
            <select name="gioi_tinh" class="form-control">
                <option value="Nam">Nam</option>
                <option value="Nu">Nữ</option>
                <option value="Khac">Khác</option>
            </select>
        </div>
        <div>
            <label>Trạng thái</label><br>
            <input type="radio" name="trang_thai" value="1" checked>
            <label class="form-check-label" for="admin_checkbox">Hoạt động</label>
            <input type="radio" name="trang_thai" value="0">
            <label class="form-check-label" for="admin_checkbox">Chưa hoạt động</label>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection

@section('script')
@endsection
