@extends('layouts.app')

@section('content')

<section style="
    background:#f6f6f6;
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    padding:40px;
">

<div style="
    width:100%;
    max-width:420px;
    background:#fff;
    border-radius:24px;
    padding:50px 40px;
    box-shadow:0 30px 60px rgba(0,0,0,.08);
    text-align:center;
">

    {{-- BRAND --}}
    <h1 style="
        letter-spacing:8px;
        font-weight:300;
        margin-bottom:10px;
        color:#111;
    ">
        DANIELLE
    </h1>

    <p style="
        font-size:14px;
        color:#777;
        margin-bottom:40px;
    ">
        Tạo tài khoản để trải nghiệm mua sắm cao cấp
    </p>

    <h2 style="
        font-weight:400;
        margin-bottom:30px;
        color:#111;
    ">
        ĐĂNG KÝ
    </h2>

    <form method="POST">
        @csrf

        <input name="name"
               placeholder="Họ và tên"
               required
               style="
                    width:100%;
                    padding:14px 16px;
                    margin-bottom:16px;
                    border-radius:10px;
                    border:1px solid #ddd;
                    font-size:14px;
               ">

        <input name="email"
               placeholder="Email"
               required
               style="
                    width:100%;
                    padding:14px 16px;
                    margin-bottom:16px;
                    border-radius:10px;
                    border:1px solid #ddd;
                    font-size:14px;
               ">

        <input type="password"
               name="password"
               placeholder="Mật khẩu"
               required
               style="
                    width:100%;
                    padding:14px 16px;
                    margin-bottom:24px;
                    border-radius:10px;
                    border:1px solid #ddd;
                    font-size:14px;
               ">

        <button style="
            width:100%;
            padding:14px;
            border-radius:40px;
            background:#b58e3e;
            color:#fff;
            border:none;
            font-size:14px;
            letter-spacing:1px;
            cursor:pointer;
            transition:.3s;
        "
        onmouseover="this.style.opacity='0.85'"
        onmouseout="this.style.opacity='1'"
        >
            ĐĂNG KÝ
        </button>
    </form>

    <p style="
        margin-top:24px;
        font-size:14px;
        color:#555;
    ">
        Đã có tài khoản?
        <a href="{{ route('login') }}"
           style="
                color:#b58e3e;
                text-decoration:none;
                font-weight:500;
           "
        >
            Đăng nhập
        </a>
    </p>

</div>

</section>

@endsection
