<?php

namespace App\Http\Controllers\admins;

use App\Models\User;
use App\Models\ChucVu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $table;
    public function __construct()
    {
        $this->table = new User();
    }
    public function index()
    {
        $data = [];
        $data['data'] = $this->table->listUser();
        $data['title'] = 'Trang danh sách người dùng';
        // dd($data);
        return view('admins.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [];
        $data['title'] = "Trang thêm tài khoản Admin";
        return view('admins.user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'ho_ten' => 'required',
                'email' => 'required',
                'so_dien_thoai' => 'required',
                'password' => 'required',
                'dia_chi' => 'required',
                'ngay_sinh' => 'required',
                'chuc_vu_id' => 'required',
                'gioi_tinh' => 'required',
            ],
            [
                'ho_ten.required' => 'Chưa nhập họ tên',
                'email.required' => 'Chưa nhập email',
                'dia_chi.required' => 'Chưa nhập địa chỉ',
                'so_dien_thoai.required' => 'Chưa nhập số điện thoại',
                'password.required' => 'Chưa nhập mật khẩu',
                'ngay_sinh.required' => 'Chưa nhập ngày sinh',
                'chuc_vu_id.required' => 'Chưa chọn chức vụ',
                'gioi_tinh.required' => 'Chưa chọn giới tính',
            ]
        );
        if ($request->hasFile('anh_dai_dien')) {
            $img = $request->file('anh_dai_dien');
            $path = $img->store('/uploads', 'public');
            $data['anh_dai_dien'] = $path;
        }
        $data["password"] = Hash::make($data["password"]);
        $this->table->createUser($data);
        return redirect()->route('user.index')->with('success', 'Thêm thành công');
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
    public function edit(string $id)
    {

        $data = [];
        $data['data'] = $this->table->showUser($id);
        $data['title'] = "Trang thêm tài khoản Admin";
        $data['quyen'] = $this->table->getChucVu();
        // dd($data);  
        return view('admins.user.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate(
            [
                'ho_ten' => 'required',
                'email' => 'required',
                'so_dien_thoai' => 'required',
                'dia_chi' => 'required',
                'ngay_sinh' => 'required',
                'chuc_vu_id' => 'required',
                'gioi_tinh' => 'required',
            ],
            [
                'ho_ten.required' => 'Chưa nhập họ tên',
                'email.required' => 'Chưa nhập email',
                'dia_chi.required' => 'Chưa nhập địa chỉ',
                'so_dien_thoai.required' => 'Chưa nhập số điện thoại',
                'ngay_sinh.required' => 'Chưa nhập ngày sinh',
                'chuc_vu_id.required' => 'Chưa chọn chức vụ',
                'gioi_tinh.required' => 'Chưa chọn giới tính',
            ]
        );
        if ($request->only('password')) {
            $data['password'] = $request->input('password');
            // dd($data['password']);
            $data['password'] = Hash::make($data['password']);
        }
        $oldImg = User::find($id);
        if ($request->hasFile('anh_dai_dien')) {

            $img = $request->file('anh_dai_dien');
            $path = $img->store('/uploads', 'public');
            $data['anh_dai_dien'] = $path;
            if ($oldImg->anh_dai_dien != '/uploads/avatar.png') {
                Storage::disk('public')->delete($oldImg->anh_dai_dien);
            }
        }
        $this->table->updateUser($data, $id);
        return redirect()->route('user.index')->with('success', 'Cập nhập thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $oldImg = User::find($id);
        if ($oldImg->anh_dai_dien != '/uploads/avatar.png') {
            Storage::disk('public')->delete($oldImg->anh_dai_dien);
        }
        $this->table->deleteUser($id);
        return redirect()->route('user.index')->with('success', 'Xóa thành công');
    }
}
