@extends('layouts.admin')

@section('title')
    ADMIN
@endsection
@section('css')
@endsection


@section('content')
<h3 class="text-center mb-4">Trang Cập Nhật Trạng Thái Bình Luận</h3>
<form action="{{ route('binhluan.update', $list_binh_luan->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="tai_khoan_id" value="{{$list_binh_luan->tai_khoan_id}}" class="form-control" >
    <input type="hidden" name="san_pham_id" value="{{$list_binh_luan->san_pham_id}}" class="form-control">
    <div class="mb-3">
        <label class="form-label">ID</label>
        <input type="text" name="id" value="{{$list_binh_luan->id}}" class="form-control" readonly>
      </div>
    <div class="mb-3">
        <label class="form-label">Tên Người Dùng</label>
        <input type="text" name="ho_ten" value="{{$list_binh_luan->ho_ten}}" class="form-control" readonly >
    </div>
    <div class="mb-3">
        <label class="form-label">Tên Sản Phẩm</label>
        <input type="text" name="ten_san_pham" value="{{$list_binh_luan->ten_san_pham}}" class="form-control" readonly >
    </div>
    <div class="mb-3">
        <span class="form-label">Nội Dung</span>
        <textarea class="form-control" readonly name="noi_dung" aria-label="With textarea">{{$list_binh_luan->noi_dung}}</textarea>
    </div> 
    <div class="mb-3">
        <label class="form-label">Ngày đăng</label>
        <input type="text" name="thoi_gian" value="{{$list_binh_luan->thoi_gian}}" class="form-control" readonly >
    </div>          
    <div>
        <label>Trạng thái</label>
        <select name="trang_thai" id="" class="form-control">
            {{-- <option value="{{ $list_binh_luan->trang_thai }}">{{ $list_binh_luan->trang_thai == 0 ? "Đã Duyệt" : "Chưa Duyệt" }}</option> --}}

            @if ($list_binh_luan->trang_thai == 0)
            <option selected value="0">Đã Duyệt</option>                    
            <option value="1">Chưa Duyệt</option>                    
            @else
            <option value="0">Đã Duyệt</option>                    
            <option selected value="1">Chưa Duyệt</option>  
            @endif
        </select>
    </div>
      
    <div class="text-center">
        <a href="{{ route('binhluan.index') }}" class="btn btn-secondary ">Quay lại</a>
        <button type="submit" class="btn btn-warning">Cập Nhật</button>
    </div>
</form>
@endsection

@section('script')
@endsection