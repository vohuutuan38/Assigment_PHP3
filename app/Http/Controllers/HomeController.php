<?php

namespace App\Http\Controllers;

use App\Models\BinhLuan;
use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $binhLuan;
    public function __construct()
    {
        $this->binhLuan = new BinhLuan();
    }

    public function index()
    {

        // $nhan = SanPham::where('danh_muc_id', '1')->get();
        // $dayChuyen = SanPham::where('danh_muc_id', '2')->get();
        // $bongTai = SanPham::where('danh_muc_id', '3')->get();

        $sanPham = SanPham::get();
        $danhMuc = DanhMuc::get();
        return view('clients.index', compact('sanPham', 'danhMuc'));
    }

    public function list()
    {
        $danhMuc = DanhMuc::get();
        $sanPham = SanPham::get();
        return view('clients.sanphams.list', compact('danhMuc', 'sanPham'));
    }
    public function detail($id)
    {
        $danhMuc = DanhMuc::get();
        $sanPham = SanPham::query()->findOrFail($id);
        $listSanPham = SanPham::get();
        $binhLuan = $this->binhLuan->getByIdSp($id);

        return view('clients.sanphams.chitiet', compact('danhMuc', 'sanPham', 'listSanPham', 'binhLuan'));
    }

    public function productCategory (string $id) {
        $danhMuc = DanhMuc::get();
        $listSanPham = SanPham::with('danhmuc')->where('id', $id)->get();
        // dd($listSanPham);

        return view('clients.sanphams.list', compact('danhMuc', 'listSanPham'));
    }

    public function search (Request $request) {
        $danhMuc = DanhMuc::get();
        $search = $request->input('search');
        $listSanPham = SanPham::query()
                            ->when($search, function($query, $search) {
                                return $query
                                ->where('ten_san_pham', 'like', "%$search%");
                            })
                            ->get();
        // dd($listSanPham);

        return view('clients.sanphams.list', compact('danhMuc', 'listSanPham'));
    }
}
