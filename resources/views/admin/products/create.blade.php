@extends('layouts.admin')

@section('content')


<form method="POST"
      action="{{ route('admin.products.store') }}"
      enctype="multipart/form-data"
      style="
        max-width:700px;
        background:#fff;
        padding:30px;
        border-radius:20px;
        box-shadow:0 10px 30px rgba(0,0,0,.08);
      ">
    @csrf

    {{-- TÊN SẢN PHẨM --}}
    <div style="margin-bottom:22px;">
        <label style="font-size:14px;color:#555;">Tên sản phẩm</label>
        <input name="name"
               required
               placeholder="Nhập tên sản phẩm"
               style="
                    width:100%;
                    padding:12px 14px;
                    margin-top:6px;
                    border-radius:10px;
                    border:1px solid #ddd;
               ">
    </div>

    {{-- GIÁ --}}
    <div style="margin-bottom:22px;">
        <label style="font-size:14px;color:#555;">Giá</label>
        <input name="price"
               type="number"
               required
               placeholder="Nhập giá sản phẩm"
               style="
                    width:100%;
                    padding:12px 14px;
                    margin-top:6px;
                    border-radius:10px;
                    border:1px solid #ddd;
               ">
    </div>

    {{-- ẢNH --}}
    <div style="margin-bottom:22px;">
        <label style="font-size:14px;color:#555;">Ảnh sản phẩm</label>
        <input type="file"
               name="image"
               style="
                    display:block;
                    margin-top:8px;
               ">
    </div>

    {{-- FEATURED --}}
    <div style="
        margin-bottom:30px;
        padding:14px;
        background:#f8f8f8;
        border-radius:12px;
    ">
        <label style="
            display:flex;
            align-items:center;
            gap:10px;
            cursor:pointer;
        ">
            <input type="checkbox"
                   name="is_featured"
                   value="1">
            <span style="font-size:14px;color:#333;">
                Sản phẩm nổi bật (hiển thị trang chủ)
            </span>
        </label>
    </div>

    {{-- ACTION --}}
    <div style="display:flex;gap:14px;">
        <button class="btn btn-add"
                style="
                    padding:10px 26px;
                    border-radius:20px;
                    border:none;
                    cursor:pointer;
                ">
            Lưu sản phẩm
        </button>

        <a href="{{ route('admin.products.index') }}"
           style="
                padding:10px 26px;
                border-radius:20px;
                border:1px solid #ccc;
                text-decoration:none;
                color:#333;
           ">
            Quay lại
        </a>
    </div>

</form>

@endsection
