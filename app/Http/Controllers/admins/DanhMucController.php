<?php

namespace App\Http\Controllers\admins;

use App\Models\DanhMuc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $danhmuc = DanhMuc::all();
        return view('admins.danhmuc.index',compact('danhmuc'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.danhmuc.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){

    if ($request->isMethod('POST')) {

        $params = $request->except('_token');

        if ($request->hasFile('hinh_anh')) {
           $filename =$request->file('hinh_anh')->store('uploads/danhmuc','public');
        } else {
            $filename = null;
        }

        $params['hinh_anh'] = $filename;

        DanhMuc::create($params);
        return redirect()->route('danhmuc.index')->with('thongbao', 'Thêm sản phẩm thành công');
    }
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
    public function edit(DanhMuc $danhmuc)
    {

        return view('admins.danhmuc.update',compact('danhmuc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {
        $params = $request->all();

        $danhMuc = DanhMuc::query()->findOrFail($id);
        if ($request->hasFile('hinh_anh') && Storage::disk('public')->exists($danhMuc->hinh_anh) ) {
            // kiểm tra trong database có ảnh không và kiểm tra trong thư mục public
            // nếu người dùng đẩy hình ảnh mới thì xóa hình ảnh cũ
            if ($danhMuc->hinh_anh) {
                Storage::disk('public')->delete($danhMuc->hinh_anh);
            }
            // thêm ảnh mới
            $params['hinh_anh'] = $request->file('hinh_anh')->store('uploads/sanpham', 'public');
        } else {
            $params['hinh_anh'] = $danhMuc->hinh_anh;
        }
        
        $danhMuc->update($params);

       return redirect()->route('danhmuc.index')->with('thongbao','Cập nhật danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DanhMuc $danhmuc)
    {
        $danhmuc->delete();
        return redirect()->route('danhmuc.index')->with('thongbao','Xóa danh mục thành công');
    }
}
