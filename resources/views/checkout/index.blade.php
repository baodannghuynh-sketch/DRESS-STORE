@extends('layouts.app')

@section('content')

<section style="
    background:#f6f6f6;
    padding:120px 40px;
    min-height:100vh;
">

<h2 style="
    text-align:center;
    letter-spacing:6px;
    margin-bottom:60px;
    font-size:32px;
    font-weight:300;
    color:#111;
">
    THANH TOÁN
</h2>

<div style="
    max-width:1200px;
    margin:auto;
    background:#fff;
    border-radius:24px;
    padding:40px;
    box-shadow:0 30px 60px rgba(0,0,0,.08);
">

{{-- DANH SÁCH SẢN PHẨM --}}
<table style="
    width:100%;
    border-collapse:collapse;
    text-align:center;
    margin-bottom:40px;
    color:#111; /* ⭐ FIX QUAN TRỌNG */
">
    <tr style="
        border-bottom:2px solid #b58e3e;
        color:#555;
        font-size:14px;
        letter-spacing:1px;
    ">
        <th style="padding:16px;">SẢN PHẨM</th>
        <th>SỐ LƯỢNG</th>
        <th>GIÁ</th>
        <th>TỔNG</th>
    </tr>

    @php $total = 0; @endphp

    @foreach($cart as $item)
        @php
            $line = $item['price'] * $item['qty'];
            $total += $line;
        @endphp
        <tr style="
            border-bottom:1px solid #f0f0f0;
            font-size:15px;
        ">
            <td style="padding:18px;color:#111;">
                {{ $item['name'] }}
            </td>

            <td style="color:#111;">
                {{ $item['qty'] }}
            </td>

            <td style="color:#b58e3e;font-weight:500;">
                {{ number_format($item['price']) }} đ
            </td>

            <td style="color:#111;font-weight:500;">
                {{ number_format($line) }} đ
            </td>
        </tr>
    @endforeach
</table>

<div style="
    text-align:right;
    font-size:20px;
    font-weight:500;
    margin-bottom:50px;
    color:#111;
">
    Tổng tiền:
    <span style="color:#b58e3e;margin-left:10px;">
        {{ number_format($total) }} đ
    </span>
</div>

{{-- FORM NGƯỜI NHẬN --}}
<form method="POST" action="{{ route('checkout.place') }}">
    @csrf

    <h3 style="
        margin-bottom:20px;
        font-weight:400;
        color:#111;
    ">
        Thông tin người nhận
    </h3>

    <div style="display:grid;gap:18px;max-width:520px;">

        <div>
            <label style="font-size:14px;color:#555;">Họ và tên</label>
            <input type="text" name="receiver_name" required
                   style="
                        width:100%;
                        padding:12px 14px;
                        border-radius:10px;
                        border:1px solid #ddd;
                        margin-top:6px;
                   ">
        </div>

        <div>
            <label style="font-size:14px;color:#555;">Số điện thoại</label>
            <input type="text" name="receiver_phone" required
                   style="
                        width:100%;
                        padding:12px 14px;
                        border-radius:10px;
                        border:1px solid #ddd;
                        margin-top:6px;
                   ">
        </div>

        <div>
            <label style="font-size:14px;color:#555;">Địa chỉ giao hàng</label>
            <textarea name="receiver_address" required
                      style="
                        width:100%;
                        padding:12px 14px;
                        border-radius:10px;
                        border:1px solid #ddd;
                        margin-top:6px;
                        min-height:90px;
                      "></textarea>
        </div>

        <div>
            <label style="font-size:14px;color:#555;">Ghi chú</label>
            <textarea name="note"
                      style="
                        width:100%;
                        padding:12px 14px;
                        border-radius:10px;
                        border:1px solid #ddd;
                        margin-top:6px;
                        min-height:70px;
                      "></textarea>
        </div>

    </div>

    <div style="
        display:flex;
        justify-content:flex-end;
        margin-top:50px;
    ">
        <button type="submit"
                style="
                    padding:16px 48px;
                    border-radius:40px;
                    border:1px solid #b58e3e;
                    background:#b58e3e;
                    color:#fff;
                    font-size:14px;
                    letter-spacing:1px;
                    cursor:pointer;
                    transition:.3s;
                "
                onmouseover="this.style.opacity='0.85'"
                onmouseout="this.style.opacity='1'"
        >
            XÁC NHẬN ĐẶT HÀNG
        </button>
    </div>

</form>

</div>

</section>

@endsection
