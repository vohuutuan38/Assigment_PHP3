@extends('layouts.admin')

@section('title')
    ADMIN
@endsection
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
  @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css");
</style>
@endsection


@section('content')
<h3 class="text-center mb-0">Trang sửa sản phẩm</h3>
<form action="{{route('sanpham.update',$sanPham->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label" hidden>ID</label>
        <input type="text" name="id" value="{{$sanPham->id}}" class="form-control" hidden>
      </div>
    <div class="mb-3">
        <label class="form-label">Tên Sản Phẩm</label>
        <input type="text" name="ten_san_pham" value="{{$sanPham->ten_san_pham}}" class="form-control" >
      </div>
      <div class="mb-3">
        <label class="form-label">Số Lượng</label>
        <input type="number" name="so_luong" value="{{$sanPham->so_luong}}" class="form-control" >
      </div>
      <div class="mb-3">
        <label class="form-label">Giá Sản Phẩm</label>
        <input type="number" name="gia_san_pham" value="{{$sanPham->gia_san_pham}}" class="form-control" >
      </div>
      <div class="mb-3">
        <label class="form-label">Giá Khuyến Mãi</label>
        <input type="number" name="gia_khuyen_mai" value="{{$sanPham->gia_khuyen_mai}}" class="form-control" >
      </div>
      <div class="mb-3">
        <label class="form-label">Ngày Nhập</label>
        <input type="date" name="ngay_nhap" value="{{$sanPham->ngay_nhap}}" class="form-control" >
      </div>
      <div class="input-group">
        <span class="input-group-text">Mô Tả</span>
        <textarea class="form-control" name="mo_ta" aria-label="With textarea">{{$sanPham->mo_ta}}</textarea>
      </div>
      <div class="mb-3">
        <label for="">Danh Mục</label>
        <select  class="form-select" name="danh_muc_id" aria-label="Default select example">

            @foreach ($danhmuc as $dm)
            <option {{ $dm->id == $sanPham->danh_muc_id ? 'selected' : '' }} value="{{$dm->id}}">{{$dm->ten_danh_muc}}</option>
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

      <img src="{{Storage::url($sanPham->hinh_anh)}}" alt="" width="100px">
     
    </div>

    <div class="mb-3">
      <label for="hinh_anh" class="form-label">Album Hình Ảnh</label>
      <i id="add-row" class="bi bi-plus-square rounded-2 border ms-3 p-1 " style="cursor:pointer"></i>
      <table class="table align-middel table-nowrap mb-0"> 
         <tbody id="image-table-body">
          @foreach ($sanPham->hinhAnhSanPham as $index => $hinhAnh)
          <tr >
              <td class="d-flex align-items-center">
                  <img src="{{Storage::url($hinhAnh->hinh_anh)}}" id="preview_{{$index}}"  alt="hình ảnh sản phẩm"
                   style="width:50px; " class="me-3">
                   <input type="file" id="hinh_anh" name="list_hinh_anh[{{$hinhAnh->id}}]" class="form-control " placeholder="HÌnh ảnh" onchange="previewImage(this,{{$index}})">
                   <input type="hidden" name="list_hinh_anh[{{$hinhAnh->id}}]" value="{{$hinhAnh->id}}">
              </td>
              <td>
                  <i class="bi bi-trash fs-18 rounded-2 border p-1 " style="cursor:pointer" onclick="removeRow(this)" ></i>
              </td>
          </tr>
          @endforeach
         </tbody>
      </table>
      
  </div>
      
      <div class="text-center">
        <button type="submit" class="btn btn-primary ">Submit</button>
      </div>
   
  </form>
@endsection

@section('script')
<script>
     document.addEventListener('DOMContentLoaded',function(){
           var rowCount = {{count($sanPham->hinhAnhSanPham)}};

           document.getElementById('add-row').addEventListener('click',function(){
           var tableBody =document.getElementById('image-table-body')

            var newRow = document.createElement('tr');

           newRow.innerHTML =`
            <td class="d-flex align-items-center">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS0Wr3oWsq6KobkPqznhl09Wum9ujEihaUT4Q&s" id="preview_${rowCount}"  alt="hình ảnh sản phẩm"
                    style="width:50px; " class="me-3">
                    <input type="file" id="hinh_anh" name="list_hinh_anh[id_${rowCount}]" class="form-control " placeholder="HÌnh ảnh" onchange="previewImage(this,${rowCount})">
            </td>
            <td>
                <i class="bi bi-trash text-muted fs-18 rounded-2 border p-1 " style="cursor:pointer" onclick="removeRow(this)"></i>
            </td>
            `;
            tableBody.appendChild(newRow);
            rowCount++;
           })


        });

       function previewImage(input,rowIndex){
        if(input.files && input.files[0]){
            const reader = new FileReader();

            reader.onload = function(e){
               document.getElementById(`preview_${rowIndex}`).setAttribute('src',e.target.result)
            }

            reader.readAsDataURL(input.files[0]);
            
        }
        }

        function removeRow(item){
          var row = item.closest('tr');
          row.remove();
        }
</script>
@endsection