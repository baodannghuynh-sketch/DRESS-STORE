@extends('layouts.admin')

@section('content')

<h1 style="font-size:26px;margin-bottom:30px;">
    Sửa sản phẩm
</h1>

<form method="POST"
      action="{{ route('admin.products.update', $product->id) }}"
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
               value="{{ $product->name }}"
               required
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
               value="{{ $product->price }}"
               required
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

        @if($product->image)
            <div style="margin-top:14px;">
                <p style="font-size:13px;color:#777;margin-bottom:6px;">
                    Ảnh hiện tại
                </p>
                <img src="{{ asset('products/'.$product->image) }}"
                     style="
                        width:120px;
                        height:120px;
                        object-fit:contain;
                        border:1px solid #eee;
                        border-radius:10px;
                        padding:6px;
                     ">
            </div>
        @endif
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
                   value="1"
                   {{ $product->is_featured ? 'checked' : '' }}>
            <span style="font-size:14px;color:#333;">
                Sản phẩm nổi bật (hiển thị trang chủ)
            </span>
        </label>
    </div>

    {{-- ACTION --}}
    <div style="display:flex;gap:14px;">
        <button class="btn btn-edit"
                style="
                    padding:10px 24px;
                    border-radius:20px;
                    border:none;
                    cursor:pointer;
                ">
            Cập nhật
        </button>

        <a href="{{ route('admin.products.index') }}"
           style="
                padding:10px 24px;
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
