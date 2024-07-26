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

            SanPham::create($params);


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
        // dd($spbinhluan);
        return view('admins.sanpham.detail',compact('sanpham','spbinhluan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SanPham $sanpham )
    {
  
        $danhmuc = DanhMuc::all();
        return view('admins.sanpham.update', compact('sanpham', 'danhmuc',));
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

        
        
        $sanPham->update($params);

       
        // $sanpham->update($request->all());

        return redirect()->route('sanpham.index')->with('thongbao', 'Cập nhật sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SanPham $sanpham)
    {
        $sanpham->delete();
        return redirect()->route('sanpham.index')->with('thongbao', 'Xóa Sản phẩm thành công');
    }

   
}
