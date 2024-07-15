<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        // dd($request);
        // if()
        DanhMuc::create($request->all());
        return redirect()->route('danhmuc.index')->with('thongbao','Thêm sản phẩm thành công');
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
    public function update(Request $request, DanhMuc $danhmuc)
    {
        $danhmuc->update($request->all());
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
