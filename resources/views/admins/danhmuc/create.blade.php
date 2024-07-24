@extends('layouts.admin')

@section('title')
    ADMIN
@endsection
@section('css')
@endsection

@section('content')
<h3 class=" text-center mb-0">ĐÂY LÀ THÊM DANH MỤC</h3>
<form action="{{ route('danhmuc.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">ID</label>
        <input type="text" name="id" class="form-control" disabled>
      </div>
    <div class="mb-3">
      <label class="form-label">Hình ảnh</label>
      <input type="file" name="hinh_anh" class="form-control"  onchange="showImage(event)" >
      <img src="" alt="hình ảnh sản phẩm " id="image_san_pham" width="100px" style="display: none">
    </div>


    <div class="mb-3">
        <label class="form-label">Tên Danh Mục</label>
        <input type="text" name="ten_danh_muc" class="form-control" >
      </div>
      <div class="input-group">
        <span class="input-group-text">Mô Tả</span>
        <textarea class="form-control" name="mo_ta" aria-label="With textarea"></textarea>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary ">Submit</button>
      </div>
   
  </form>
@endsection



@section('script')
<script>
   function showImage(event){
     const image_san_pham = document.getElementById('image_san_pham');

     const file = event.target.files[0];

     const render = new FileReader();

     render.onload = function (){
       image_san_pham.src = render.result;
       image_san_pham.style.display = 'block';
     }

     if(file){
      render.readAsDataURL(file);
     }
  }

</script>
@endsection