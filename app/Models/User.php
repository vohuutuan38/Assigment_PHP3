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
        return $data = DB::table('users')->get();
    }
    function createUser($arr)
    {
        DB::table('users')->insert($arr);
        return redirect()->route('user.index')->with('sessces', 'Thêm thành công');
    }
    function showUser($id)
    {
        return $data = DB::table('users')->where('id', $id)->get();
    }
    function updateUser($arr, $id)
    {
        DB::table('users')->where('id', $id)
            ->update($arr);
        return redirect()->route('user.index')->with('sessces', 'Cập nhập thành công');
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
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    // /**
    //  * The attributes that should be hidden for serialization.
    //  *
    //  * @var array<int, string>
    //  */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    // /**
    //  * The attributes that should be cast.
    //  *
    //  * @var array<string, string>
    //  */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
}
