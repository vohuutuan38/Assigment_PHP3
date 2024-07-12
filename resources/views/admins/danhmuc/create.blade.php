@extends('layouts.admin')

@section('title')
    ADMIN
@endsection
@section('css')
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
<link href="{{ asset('assets/admins/css/bootstrap.min.css')}}" rel="stylesheet" />
<link href="{{ asset('assets/admins/css/paper-dashboard.css?v=2.0.1')}}" rel="stylesheet" />
<link href="{{ asset('assets/admins/demo/demo.css') }}" rel="stylesheet" />
@endsection

@section('sidebar')
<ul class="nav">
    <li >
      <a href="javascript:;">
        <i class="nc-icon nc-bank"></i>
        <p>Home</p>
      </a>
    </li>
    <li class="active ">
      <a href="{{route('admin.danhmuc')}}">
        <i class="nc-icon nc-bullet-list-67"></i>
        <p>Danh Mục</p>
      </a>
    </li>
    <li>
      <a href="javascript:;">
        <i class="nc-icon nc-app"></i>
        <p>Sản Phẩm</p>
      </a>
    </li>
    <li>
      <a href="javascript:;">
        <i class="nc-icon nc-circle-10"></i>
        <p>Tài Khoản</p>
      </a>
    </li>
    <li>
      <a href="javascript:;">
        <i class="nc-icon nc-cart-simple"></i>
        <p>Đơn hàng</p>
      </a>
    </li>
  </ul>
@endsection

@section('content')
<h3 class="description">ĐÂY LÀ THÊM DANH MỤC</h3>
@endsection



@section('script')
<script src="{{ asset('assets/admins/js/core/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admins/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/admins/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/admins/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<script src="{{ asset('assets/admins/js/plugins/chartjs.min.js') }}"></script>
<script src="{{ asset('assets/admins/js/plugins/bootstrap-notify.js') }}"></script>
<script src="{{ asset('assets/admins/js/paper-dashboard.min.js?v=2.0.1') }}" type="text/javascript"></script>
@endsection