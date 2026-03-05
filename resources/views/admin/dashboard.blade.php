@extends('layouts.admin')

@section('content')

<h1 style="font-size:28px;margin-bottom:10px;">
    ADMIN DASHBOARD
</h1>

<p style="color:#666;margin-bottom:40px;">
    Chào mừng bạn đến trang quản trị hệ thống
</p>

{{-- CARDS --}}
<div style="
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
    gap:30px;
">

    {{-- NGƯỜI DÙNG --}}
    <a href="{{ route('admin.users.index') }}"
       style="
            background:#fff;
            padding:28px;
            border-radius:18px;
            text-decoration:none;
            color:#111;
            box-shadow:0 15px 30px rgba(0,0,0,.08);
            transition:.35s;
            display:block;
       "
       onmouseover="
            this.style.transform='translateY(-8px)';
            this.style.boxShadow='0 30px 60px rgba(0,0,0,.15)';
       "
       onmouseout="
            this.style.transform='none';
            this.style.boxShadow='0 15px 30px rgba(0,0,0,.08)';
       "
    >
        <p style="font-size:13px;color:#777;letter-spacing:1px;">
            👤NGƯỜI DÙNG
        </p>
        <h2 style="margin:10px 0;">
            Quản lý
        </h2>
        <p style="color:#555;font-size:14px;">
            Thêm, sửa, xóa tài khoản người dùng
        </p>
    </a>

    {{-- SẢN PHẨM --}}
    <a href="{{ route('admin.products.index') }}"
       style="
            background:#fff;
            padding:28px;
            border-radius:18px;
            text-decoration:none;
            color:#111;
            box-shadow:0 15px 30px rgba(0,0,0,.08);
            transition:.35s;
            display:block;
       "
       onmouseover="
            this.style.transform='translateY(-8px)';
            this.style.boxShadow='0 30px 60px rgba(0,0,0,.15)';
       "
       onmouseout="
            this.style.transform='none';
            this.style.boxShadow='0 15px 30px rgba(0,0,0,.08)';
       "
    >
        <p style="font-size:13px;color:#777;letter-spacing:1px;">
            📱SẢN PHẨM
        </p>
        <h2 style="margin:10px 0;">
            Quản lý
        </h2>
        <p style="color:#555;font-size:14px;">
            Thêm mới, chỉnh sửa thông tin sản phẩm
        </p>
    </a>

    {{-- ĐƠN HÀNG --}}
    <a href="{{ route('admin.orders.index') }}"
       style="
            background:#fff;
            padding:28px;
            border-radius:18px;
            text-decoration:none;
            color:#111;
            box-shadow:0 15px 30px rgba(0,0,0,.08);
            transition:.35s;
            display:block;
       "
       onmouseover="
            this.style.transform='translateY(-8px)';
            this.style.boxShadow='0 30px 60px rgba(0,0,0,.15)';
       "
       onmouseout="
            this.style.transform='none';
            this.style.boxShadow='0 15px 30px rgba(0,0,0,.08)';
       "
    >
        <p style="font-size:13px;color:#777;letter-spacing:1px;">
            📦ĐƠN HÀNG
        </p>
        <h2 style="margin:10px 0;">
            Theo dõi
        </h2>
        <p style="color:#555;font-size:14px;">
            Xem và cập nhật trạng thái đơn hàng
        </p>
    </a>

</div>

@endsection
