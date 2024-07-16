@extends('layouts.admin')

@section('title')
    ADMIN
@endsection
@section('css')
    <style>
        .main-panel {
            height: auto !important;
        }

        .alert {
            margin-left: 0px;
        }
    </style>
@endsection
@section('content')
    <h3 class="description">{{ $title }}</h3>
    <form method="POST" action="{{ route('chucvu.store') }}" class="mb-5" enctype="multipart/form-data">
        {{-- sinh token bảo mật website tránh spawm --}}
        @csrf
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-group">
            <label>Tên chức vụ</label>
            <input type="text" name="ten_chuc_vu" class="form-control" placeholder="Tên chức vụ">
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection

@section('script')
@endsection
