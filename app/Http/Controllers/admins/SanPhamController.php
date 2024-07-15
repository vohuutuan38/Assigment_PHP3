<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SanPham $sanPham ,DanhMuc $danhmuc)
    {
        
        $sanpham = SanPham::join('danh_mucs','san_phams.danh_muc_id','=','danh_mucs.id')
                            ->select('san_phams.*','ten_danh_muc')
                            ->get();

        return view('admins.sanpham.index',compact('sanpham'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(DanhMuc $danhmuc)
    {
        $danhmuc = DanhMuc::all();
        return view('admins.sanpham.create',compact('danhmuc'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        SanPham::create($request->all());
        return redirect()->route('sanpham.index')->with('thongbao','Thêm sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SanPham $sanpham, DanhMuc $danhmuc)
    {

          $danhmuc = DanhMuc::all();
        return view('admins.sanpham.update',compact('sanpham','danhmuc',));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SanPham $sanpham)
    {
        $sanpham->update($request->all());
       return redirect()->route('sanpham.index')->with('thongbao','Cập nhật sản phẩm thành công');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SanPham $sanpham)
    {
        $sanpham->delete();
        return redirect()->route('sanpham.index')->with('thongbao','Xóa Sản phẩm thành công');
    }
}
