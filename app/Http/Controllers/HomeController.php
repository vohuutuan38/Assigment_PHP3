<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // public $sanPham;
    // public function __construct() {
    //     $this->sanPham = new SanPham();
    // }

    public function index () {
        
        $nhan = SanPham::where('danh_muc_id', '1')->get();
        $dayChuyen = SanPham::where('danh_muc_id', '2')->get();
        $bongTai = SanPham::where('danh_muc_id', '3')->get();
        $danhMuc = DanhMuc::get();
        return view('clients.index', compact('nhan', 'dayChuyen', 'bongTai', 'danhMuc'));
    }

    public function list () {
        $danhMuc = DanhMuc::get();
        
        return view('clients.sanphams.list', compact('danhMuc'));
    }
    public function detail () {
        $danhMuc = DanhMuc::get();
        
        return view('clients.sanphams.chitiet', compact('danhMuc'));
    }
}
