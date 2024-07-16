<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Models\ChucVu;
use Illuminate\Http\Request;

class ChucVuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ChucVu $chucVu)
    {
        $data = [];
        $data['title'] = 'Danh sách chức vụ';
        $data['data'] = $chucVu::all();
        return view('admins.chucvu.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [];
        $data['title'] = "Trang thêm tài khoản Admin";
        return view('admins.chucvu.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, ChucVu $chucVu)
    {
        $data = $request->validate([
            'ten_chuc_vu' => 'required'
        ], ['ten_chuc_vu.required' => 'Chưa nhập tên chức vụ']);
        ChucVu::create($data);
        return redirect()->route('chucvu.index')->with('success', 'Thêm thành công');
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
    public function edit(string $id, ChucVu $chucVu)
    {
        $data = [];
        $data['title'] = "Trang sửa chức vụ";
        $data['data'] = $chucVu::findOrFail($id)->toArray();
        // dd($data);
        return view('admins.chucvu.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'ten_chuc_vu' => 'required'
        ], ['ten_chuc_vu.required' => 'Chưa nhập tên chức vụ']);
        ChucVu::where('id', $id)->update($data);
        return redirect()->route('chucvu.index')->with('success', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, ChucVu $chucVu)
    {
        $chucVu = $chucVu::find($id);
        $chucVu->delete();
        return redirect()->route('chucvu.index')->with('success', 'Xóa thành công');
    }
}
