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
    GIỎ HÀNG
</h2>

@if(empty($cart))
    <p style="text-align:center;color:#777;font-size:16px;">
        Giỏ hàng trống.
    </p>
@else

<div style="
    max-width:1200px;
    margin:auto;
    background:#fff;
    border-radius:20px;
    padding:30px;
    box-shadow:0 30px 60px rgba(0,0,0,.08);
">

<table style="
    width:100%;
    border-collapse:collapse;
    text-align:center;
">
    <tr style="
        border-bottom:1px solid #eee;
        color:#777;
        font-size:13px;
        letter-spacing:1px;
    ">
        <th style="padding:16px;">ẢNH</th>
        <th>SẢN PHẨM</th>
        <th>GIÁ</th>
        <th>SL</th>
        <th>TỔNG</th>
        <th></th>
    </tr>

    @php $total = 0; @endphp

    @foreach($cart as $id => $item)
        @php
            $line = $item['price'] * $item['qty'];
            $total += $line;
        @endphp
        <tr style="border-bottom:1px solid #f0f0f0;">
            <td style="padding:20px;">
                @if($item['image'])
                    <img src="{{ asset('products/'.$item['image']) }}"
                         style="
                            width:70px;
                            height:70px;
                            object-fit:contain;
                         ">
                @endif
            </td>

            <td style="color:#111;font-size:15px;">
                {{ $item['name'] }}
            </td>

            <td style="color:#b58e3e;font-weight:500;">
                {{ number_format($item['price']) }} đ
            </td>

            <td>
                <form method="POST" action="{{ route('cart.update', $id) }}">
                    @csrf
                    <input type="number"
                           name="qty"
                           value="{{ $item['qty'] }}"
                           min="1"
                           style="
                                width:60px;
                                padding:6px;
                                border-radius:8px;
                                border:1px solid #ddd;
                                text-align:center;
                           ">
                    <button style="
                        margin-left:6px;
                        padding:6px 12px;
                        border:none;
                        border-radius:8px;
                        background:#eee;
                        cursor:pointer;
                    ">
                        OK
                    </button>
                </form>
            </td>

            <td style="font-weight:500;">
                {{ number_format($line) }} đ
            </td>

            <td>
                <form method="POST" action="{{ route('cart.remove', $id) }}">
                    @csrf
                    <button style="
                        background:none;
                        border:none;
                        font-size:18px;
                        color:#999;
                        cursor:pointer;
                    ">
                        ×
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

<div style="
    display:flex;
    justify-content:flex-end;
    margin-top:30px;
    font-size:20px;
    font-weight:500;
">
    Tổng tiền:
    <span style="margin-left:12px;color:#b58e3e;">
        {{ number_format($total) }} đ
    </span>
</div>

<div style="text-align:right;margin-top:30px;">
    <a href="/checkout"
       style="
            display:inline-block;
            padding:14px 36px;
            border-radius:40px;
            border:1px solid #b58e3e;
            color:#b58e3e;
            text-decoration:none;
            letter-spacing:1px;
            transition:.3s;
       "
       onmouseover="this.style.background='#b58e3e';this.style.color='#fff'"
       onmouseout="this.style.background='transparent';this.style.color='#b58e3e'"
    >
        THANH TOÁN
    </a>
</div>

</div>

@endif

</section>

@endsection
