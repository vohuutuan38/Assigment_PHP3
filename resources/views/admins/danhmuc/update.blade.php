@extends('layouts.admin')

@section('title')
    ADMIN
@endsection
@section('css')
@endsection

@section('content')
<h3 class="text-center mb-0">ĐÂY LÀ TRANG SỬA DANH MỤC</h3>
<form action="{{ route('danhmuc.update',$danhmuc->id) }}" method="POST">
    @csrf
    @method('PUT');
    <div class="mb-3">
        <label class="form-label">ID</label>
        <input type="text" name="id" value="{{$danhmuc->id}}" class="form-control" disabled>
      </div>
    <div class="mb-3">
      <label class="form-label">Hình ảnh</label>
      <input type="file" name="hinh_anh" value="{{$danhmuc->hinh_anh}}" class="form-control" >
      <img src="{{Storage::url( $danhmuc->hinh_anh)  }}" alt="" width="100px">
    </div>
    <div class="mb-3">
        <label class="form-label">Tên Danh Mục</label>
        <input type="text" name="ten_danh_muc" value="{{$danhmuc->ten_danh_muc}}" class="form-control" >
      </div>
      <div class="input-group">
        <span class="input-group-text">Mô Tả</span>
        <textarea class="form-control" name="mo_ta" aria-label="With textarea">{{$danhmuc->mo_ta}}</textarea>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary ">Submit</button>
      </div>
   
  </form>
@endsection



@section('script')
@endsection