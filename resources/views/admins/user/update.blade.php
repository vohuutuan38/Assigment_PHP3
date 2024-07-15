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
    <form method="POST" action="{{ route('user.update', $data[0]->id) }}" class="mb-5" enctype="multipart/form-data">
        {{-- sinh token bảo mật website tránh spawm --}}
        @method('PUT')
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
        <div class="form-group">
            <label>ID</label>
            <input type="text" name="ho_ten" class="form-control" value="{{ $data[0]->id }}" placeholder="Tên sản phẩm"
                readonly>
        </div>
        <div class="form-group">
            <label>Tên sản phẩm</label>
            <input type="text" name="ho_ten" class="form-control" value="{{ $data[0]->ho_ten }}"
                placeholder="Tên sản phẩm">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $data[0]->email }}" placeholder="Email">
        </div>
        <div class="form-group">
            <label>Số điện thoại</label>
            <input type="number" name="so_dien_thoai" class="form-control" value="{{ $data[0]->so_dien_thoai }}"
                placeholder="Giá sản phẩm">
        </div>
        <div>
            <label>Ảnh</label><br>
            <img src='{{ asset('storage/' . $data[0]->anh_dai_dien) }}' alt="Ảnh đại diện" width="50" height="50">
            <input type="file" name="anh_dai_dien" class="form-control">
        </div>
        <div class="form-group">
            <label>Địa chỉ</label>
            <input type="text" name="dia_chi" class="form-control" value="{{ $data[0]->dia_chi }}" placeholder="Địa chỉ">
        </div>
        <div class="form-group">
            <label>Mật khẩu</label>
            <input type="number" name="mat_khau" class="form-control" value="{{ $data[0]->mat_khau }}"
                placeholder="Tên sản phẩm">
        </div>
        <div class="form-group">
            <label>Ngày nhập</label>
            <input type="date" name="ngay_sinh" class="form-control" value="{{ $data[0]->ngay_sinh }}"
                placeholder="Tên sản phẩm">
        </div>
        <div>
            <label>Chức vụ</label><br>
            @foreach ($quyen as $item)
                <input type="radio" name="chuc_vu_id" value="{{ $item->id }}"
                    @if ($item->id == $data[0]->chuc_vu_id) checked @endif>
                <label class="form-check-label" for="admin_checkbox">{{ $item->ten_chuc_vu }}</label>
            @endforeach
        </div>
        <div class="form-group">
            <label>Giới tính</label><br>
            <select name="gioi_tinh" class="form-control">
                <option value="Nam">Nam</option>
                <option value="Nu">Nữ</option>
                <option value="Khac">Khác</option>
            </select>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection

@section('script')
@endsection
