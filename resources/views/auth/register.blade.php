@extends('layouts.auth')
@section('content')
    <h2>Đăng ký tài khoản mới</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="fxt-form">
        <form method="POST">
            @csrf
            <div class="form-group">
                <div class="fxt-transformY-50 fxt-transition-delay-1">
                    <input type="text" id="name" class="form-control" value="{{ old('ho_ten') }}" name="ho_ten"
                        placeholder="Tên" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="fxt-transformY-50 fxt-transition-delay-1">
                    <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}"
                        placeholder="Email" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="fxt-transformY-50 fxt-transition-delay-2">
                    <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}"
                        placeholder="Mật khẩu" required="required">
                    <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                </div>
            </div>
            <div class="form-group">
                <div class="fxt-transformY-50 fxt-transition-delay-2">
                    <input id="password" type="password" class="form-control"
                        value="{{ old('password_confirmation') }}"name="password_confirmation"
                        placeholder="Xác nhận mật khẩu" required="required">
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
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="fxt-transformY-50 fxt-transition-delay-4">
                    <button type="submit" class="fxt-btn-fill">Đăng ký</button>
                </div>
            </div>
        </form>
    </div>
    <div class="fxt-footer">
        <div class="fxt-transformY-50 fxt-transition-delay-9">
            <p>Bạn đã có tài khoản?<a href="{{ route('login.form') }}" class="switcher-text2 inline-text">Đăng nhập</a></p>
        </div>
    </div>
@endsection
