@extends('layouts.auth')
@section('content')
    <h2>Đăng nhập tài khoản của bạn</h2>
    <div class="fxt-form">
        <form method="POST">
            @csrf
            @session('success')
                <div class="alert alert-success">{{ session('success') }}</div>
            @endsession
            @session('errors')
                <div class="alert alert-danger">{{ session('errors') }}</div>
            @endsession
            <div class="form-group">
                <div class="fxt-transformY-50 fxt-transition-delay-1">
                    <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}"
                        placeholder="Email" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="fxt-transformY-50 fxt-transition-delay-2">
                    <input id="password" type="password" class="form-control" value="{{ old('password') }}" name="password"
                        placeholder="Mật khẩu" required>
                    <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                </div>
            </div>
            <div class="form-group">
                <div class="fxt-transformY-50 fxt-transition-delay-3">
                    <div class="fxt-checkbox-area">
                        {{-- <div class="checkbox">
                            <input id="checkbox1" type="checkbox">
                            <label for="checkbox1">Giữ đăng nhập</label>
                        </div> --}}
                        <a href="{{ route('sendEmail.form') }}" class="switcher-text">Quên mật khẩu</a>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="fxt-transformY-50 fxt-transition-delay-4">
                    <button type="submit" class="fxt-btn-fill">Đăng nhập</button>
                </div>
            </div>
        </form>
    </div>
    @include('auth.component.noAccout')
@endsection
