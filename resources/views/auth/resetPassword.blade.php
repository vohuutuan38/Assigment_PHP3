@extends('layouts.auth')
@section('content')
    <h2>Đặt lại mật khẩu</h2>
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
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group">
                <div class="fxt-transformY-50 fxt-transition-delay-1">
                    <input type="email" id="email" class="form-control" value="{{ $email }}" name="email"
                        placeholder="Email" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="fxt-transformY-50
                fxt-transition-delay-2">
                    <input id="password" type="password" class="form-control" name="password" placeholder="Mật khẩu mới"
                        required="required">
                    <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                </div>
            </div>
            <div class="form-group">
                <div class="fxt-transformY-50 fxt-transition-delay-2">
                    <input id="password" type="password_confirmation" class="form-control" name="password_confirmation"
                        placeholder="Xác nhận mật khẩu" required="required">
                    <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                </div>
            </div>
            <div class="form-group">
                <div class="fxt-transformY-50 fxt-transition-delay-4">
                    <button type="submit" class="fxt-btn-fill">Đổi mật khẩu</button>
                </div>
            </div>
        </form>
    </div>

@endsection
