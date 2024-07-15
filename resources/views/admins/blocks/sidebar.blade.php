<ul class="nav">
    <li @if (request()->path() == 'admin') class="active " @endif>
        <a href="admin">
            <i class="nc-icon nc-bank"></i>
            <p>Home</p>
        </a>
    </li>
    <li @if (request()->path() == 'danhmuc') class="active " @endif>
        <a href="{{ route('danhmuc.index') }}">
            <i class="nc-icon nc-bullet-list-67"></i>
            <p>Danh Mục</p>
        </a>
    </li>
    <li @if (request()->path() == 'sanpham') class="active " @endif>
        <a href="{{ route('sanpham.index') }}">
            <i class="nc-icon nc-app"></i>
            <p>Sản Phẩm</p>
        </a>
    </li>
    <li @if (request()->path() == 'chucvu') class="active " @endif>
        <a href="{{ route('chucvu.index') }}">
            <i class="nc-icon nc-circle-10"></i>
            <p>Chức Vụ</p>
        </a>
    </li>
    <li @if (request()->path() == 'user') class="active " @endif>
        <a href="{{ route('user.index') }}">
            <i class="nc-icon nc-circle-10"></i>
            <p>Tài Khoản</p>
        </a>
    </li>
    <li @if (request()->path() == 'donhang') class="active " @endif>
        <a href="javascript:;">
            <i class="nc-icon nc-cart-simple"></i>
            <p>Đơn hàng</p>
        </a>
    </li>
</ul>
