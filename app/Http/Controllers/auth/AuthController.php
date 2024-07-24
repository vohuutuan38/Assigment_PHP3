<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    function showFormLogin()
    {
        return view('auth.login');
    }
    function login(LoginRequest $request)
    {
        $data = $request->except('_token');
        if (Auth::attempt($data)) {
            if (Auth::user()->chucVu->ten_chuc_vu == 'Admin') {
                return redirect('/sanpham');
            }
            return redirect()->intended('/');
        }
        return redirect()->route('login.form')->with('errors', 'Tài khoản hoặc mật khẩu không đúng');
    }
    function showFormRegister()
    {
        return view('auth.register');
    }
    function Register(RegisterRequest $request)
    {
        $data = $request->except('_token');
        $data['password'] = Hash::make($data['password']);
        // dd($data);
        $register = User::create($data);
        Auth::login($register);
        return redirect()->intended('/');
    }
    function showFormSendMail()
    {
        return view('auth.sendEmail');
    }
    function SendMail(Request $request)
    {
        $data = $request->only('email');
        $status = Password::sendResetLink($data);
        return $status == Password::RESET_LINK_SENT ? back()->with(['status' => "Gửi email thành công"]) : back()->withErrors(['email' => _($status)]);
    }
    function showFormResetPassword($token, Request $request)
    {
        $email = $request->email;
        return view('auth.resetPassword', ['token' => $token, 'email' => $email]);
    }
    function ResetPassword(Request $request)
    {
        $data = $request->only('email', 'password', 'password_confirmation', 'token');
        $status = Password::reset(
            $data,
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->save();
            }
        );
        return $status == Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
    function logout()
    {
        Auth::logout();
        return redirect()->route('login.form');
    }
}
