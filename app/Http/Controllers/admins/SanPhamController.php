<?php

namespace App\Http\Controllers\admins;

use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;
use App\Models\HinhAnhSanPham;
use App\Http\Controllers\Controller;
use App\Models\BinhLuan;
use Illuminate\Support\Facades\Storage;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SanPham $sanPham, DanhMuc $danhmuc)
    {

        $sanpham = SanPham::join('danh_mucs', 'san_phams.danh_muc_id', '=', 'danh_mucs.id')
            ->select('san_phams.*', 'ten_danh_muc')
            ->get();

        //   dd($sanpham);
        return view('admins.sanpham.index', compact('sanpham'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(DanhMuc $danhmuc)
    {

        $danhmuc = DanhMuc::all();

        return view('admins.sanpham.create', compact('danhmuc'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {

            $params = $request->all();

            if ($request->hasFile('hinh_anh')) {
                $filename = $request->file('hinh_anh')->store('uploads/sanpham', 'public');
            } else {
                $filename = null;
            }

                $params['hinh_anh'] = $filename;

           $sanPham = SanPham::query()->create($params);

           $sanPhamID = $sanPham->id;
           // thêm album
           if($request->hasFile('list_hinh_anh')){
            foreach($request->file('list_hinh_anh') as $image){
               if($image){
                  $path = $image->store('uploads/hinhanhsanpham/id_'.$sanPhamID,'public');
                  $sanPham->hinhAnhSanPham()->create([  
                    'san_pham_id' => $sanPhamID,
                    'hinh_anh' => $path,
                ]);
               }
            }
        }

            return redirect()->route('sanpham.index')->with('thongbao', 'Thêm sản phẩm thành công');
        }
    }

    /**
     * Display the specified resource.
     */
    public $binhluan;
    public function show(string $id)
    {
 
        $sanpham = SanPham::query()->findOrFail($id);
        
        $this->binhluan = new BinhLuan();
        $spbinhluan = $this->binhluan->getByIdSp($id);
        $hinhAnhSanPham = $sanpham->hinhAnhSanPham->pluck('hinh_anh');
  
        // dd($hinhAnhSanPham);
        return view('admins.sanpham.detail',compact('sanpham','spbinhluan','hinhAnhSanPham'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id )
    {
  
        $danhmuc = DanhMuc::all();
        $sanPham = SanPham::query()->findOrFail($id);
        return view('admins.sanpham.update', compact('danhmuc','sanPham'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {
        $params = $request->except('_token','_method');

        $sanPham = SanPham::query()->findOrFail($id);
            if ($request->hasFile('hinh_anh') && Storage::disk('public')->exists($sanPham->hinh_anh) ) {

                if ($sanPham->hinh_anh) {
                    Storage::disk('public')->delete($sanPham->hinh_anh);
                }
                // thêm ảnh mới
                $params['hinh_anh'] = $request->file('hinh_anh')->store('uploads/sanpham', 'public');
            } else {
                $params['hinh_anh'] = $sanPham->hinh_anh;
            }

                         // Xử lý album ảnh 
           
                         $currentImages = $sanPham->hinhAnhSanPham->pluck('id')->toArray();
                         $arrayCombine = array_combine($currentImages,$currentImages);
         
                         // Trường hợp xóa ảnh
                         foreach ($arrayCombine as $key => $value) {
                             // Tìm kiếm id hình ảnh trong mảng hình ảnh mới đây lên 
                             // Nếu không tồn tại id thì tức người dùng đã xóa id hình ảnh đó
                             if (!array_key_exists($key,$request->list_hinh_anh)) {
                                 $hinhAnhSanPham = HinhAnhSanPham::query()->find($key);
                                 // Xóa hình ảnh 
                                 if ($hinhAnhSanPham && Storage::disk('public')->exists($hinhAnhSanPham->hinh_anh)) {
                                     Storage::disk('public')->delete($hinhAnhSanPham->hinh_anh);
                                     $hinhAnhSanPham->delete();
                                 }
                             }
                         }
                       // Trường hợp thêm hoặc sửa
                       foreach ($request->list_hinh_anh as $key => $image) {
                         if(!array_key_exists($key,$arrayCombine)){
                             if($request->hasFile("list_hinh_anh.$key")){
                                $path = $image->store('uploads/hinhanhsanpham/id_' .$id,'public');
                                $sanPham->hinhAnhSanPham()->create([
                                 'san_pham_id' => $id,
                                 'hinh_anh' => $path,
                                ]);
                             }
                         }else if(is_file($image) && $request->hasFile("list_hinh_anh.$key")){
                             // trường hợp thay đổi hình ảnh 
                             $hinhAnhSanPham = HinhAnhSanPham::query()->find($key);
                             if($hinhAnhSanPham && Storage::disk('public')->exists($hinhAnhSanPham->hinh_anh) ){
                                 Storage::disk('public')->delete($hinhAnhSanPham->hinh_anh);
                             }
                             $path = $image->store('uploads/hinhanhsanpham/id_' .$id,'public');
                             $hinhAnhSanPham->update([
                                 'hinh_anh' => $path,
                                ]);
         
                         }
                       
         
                      }

        
        
        $sanPham->update($params);

       
        // $sanpham->update($request->all());

        return redirect()->route('sanpham.index')->with('thongbao', 'Cập nhật sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sanPham = SanPham::query()->findOrFail($id);

        if ($sanPham->hinh_anh && Storage::disk('public')->exists($sanPham->hinh_anh)) {
            Storage::disk('public')->delete($sanPham->hinh_anh);
        }

        $sanPham->hinhAnhSanPham()->delete();

         // Xóa toàn bộ hình ảnh trong thư mục
         $path = 'uploads/hinhanhsanpham/id_' .$id;
         if (Storage::disk('public')->exists($path)) {
             Storage::disk('public')->deleteDirectory($path);
         }

        $sanPham->delete();
        return redirect()->route('sanpham.index')->with('thongbao', 'Xóa Sản phẩm thành công');
    }

   
}
