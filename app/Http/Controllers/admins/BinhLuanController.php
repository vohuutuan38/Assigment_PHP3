<?php

namespace App\Http\Controllers\admins;

use App\Models\BinhLuan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BinhLuanController extends Controller
{
    public $binh_luans;

    public function __construct() {
        $this->binh_luans = new BinhLuan();

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_binh_luan = $this->binh_luans->getAll();
        
        return view('admins.binhluan.index', compact('list_binh_luan'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $list_binh_luan = $this->binh_luans->getById($id);
        // // dd($list_binh_luan);
        
        // return view('admins.binhluan.show', compact('list_binh_luan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $list_binh_luan = $this->binh_luans->getById($id);
        $trang_thai = $this->binh_luans->getAll();
        // dd($list_binh_luan);
        
        return view('admins.binhluan.edit', compact('list_binh_luan', 'trang_thai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $binh_luan = $this->binh_luans->find($id);
        $dataUdate = [
            'tai_khoan_id' => $request->tai_khoan_id,
            'san_pham_id' => $request->san_pham_id,
            'noi_dung' => $request->noi_dung,
            'thoi_gian' => $request->thoi_gian,
            'trang_thai' => $request->trang_thai
        ];
        // dd($dataUdate);
        $updateBinhLuan = $this->binh_luans->updateBinhLuan($dataUdate, $id);

        return redirect()->route('binhluan.index')->with('thongbao','Cập nhật trạng thái thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteBinhLuan = $this->binh_luans->deleteBinhLuan($id);

        return redirect()->route('binhluan.index')->with('thongbao','Xóa Bình Luận thành công');
    }
}
