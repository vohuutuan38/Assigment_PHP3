@extends('layouts.admin')

@section('title')
    ADMIN
@endsection
@section('css')
    <style>
        .main-panel {
            height: auto !important;
        }
    </style>
@endsection
@section('content')
    <h3 class="description">{{ $title }}</h3>
    <a href="{{ route('chucvu.create') }}" class="btn btn-success">Thêm chức vụ</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên chức vụ</th>
                <th scope="col">Chức năng</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->ten_chuc_vu }}</td>
                    <td>
                        <a href="{{ route('chucvu.edit', $item->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('chucvu.destroy', $item->id) }}"
                            onsubmit="return confirm('Bạn thực sự muốn xóa ?')" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
    </table>
@endsection



@section('script')
@endsection
