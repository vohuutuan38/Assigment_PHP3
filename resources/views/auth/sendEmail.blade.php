@extends('layouts.auth')
@section('content')
    <h2>Khôi phục mật khẩu</h2>
    @session('status')
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endsession
    <div class="fxt-form">
        <form method="POST">
            @csrf
            <div class="form-group">
                <div class="fxt-transformY-50 fxt-transition-delay-1">
                    <input type="email" id="email" class="form-control" name="email" placeholder="Email"
                        required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="fxt-transformY-50 fxt-transition-delay-4">
                    <button type="submit" class="fxt-btn-fill">Gửi email</button>
                </div>
            </div>
        </form>
    </div>
    @include('auth.component.noAccout')
@endsection
