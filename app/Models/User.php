<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';
    function listUser()
    {
        return $data = DB::table('users')->join('chuc_vus', 'chuc_vus.id', 'users.chuc_vu_id')
            ->select('users.*', 'chuc_vus.ten_chuc_vu')
            ->get();
    }
    function createUser($arr)
    {
        DB::table('users')->insert($arr);
    }
    function showUser($id)
    {
        return $data = DB::table('users')->where('id', $id)->get();
    }
    function getChucVu()
    {
        return $data = DB::table('chuc_vus')->get();
    }
    function updateUser($arr, $id)
    {
        DB::table('users')->where('id', $id)
            ->update($arr);
    }
    function deleteUser($id)
    {
        return  DB::table('users')->where('id', $id)->delete();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'anh_dai_dien',
        'ho_ten',
        'email',
        'so_dien_thoai',
        'gioi_tinh',
        'dia_chi',
        'ngay_sinh',
        'password',
        'trang_thai',

    ];

    // /**
    //  * The attributes that should be hidden for serialization.
    //  *
    //  * @var array<int, string>
    //  */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    function chucVu()
    {
        return $this->belongsTo(ChucVu::class);
    }
    // /**
    //  * The attributes that should be cast.
    //  *
    //  * @var array<string, string>
    //  */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
}
