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
    ĐƠN HÀNG CỦA BẠN
</h2>

@if($orders->count() == 0)
    <p style="
        text-align:center;
        color:#777;
        font-size:16px;
    ">
        Bạn chưa có đơn hàng nào.
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
    color:#111;               /* ⭐ FIX QUAN TRỌNG */
    font-size:15px;
">
    <tr style="
        border-bottom:1px solid #eee;
        color:#555;
        font-size:13px;
        letter-spacing:1px;
    ">
        <th style="padding:16px;">MÃ ĐƠN</th>
        <th>NGƯỜI NHẬN</th>
        <th>SĐT</th>
        <th>ĐỊA CHỈ</th>
        <th>TỔNG TIỀN</th>
        <th>TRẠNG THÁI</th>
        <th>NGÀY ĐẶT</th>
    </tr>

    @foreach($orders as $o)
    <tr style="
        border-bottom:1px solid #f0f0f0;
        color:#111;
    ">
        <td style="
            padding:18px;
            font-weight:500;
            color:#111;
        ">
            #{{ $o->id }}
        </td>

        <td style="color:#111;">
            {{ $o->receiver_name }}
        </td>

        <td style="color:#111;">
            {{ $o->receiver_phone }}
        </td>

        <td style="
            max-width:240px;
            color:#111;
        ">
            {{ $o->receiver_address }}
        </td>

        <td style="
            color:#b58e3e;
            font-weight:500;
        ">
            {{ number_format($o->total) }} đ
        </td>

        <td>
            <span style="
                padding:6px 14px;
                border-radius:20px;
                font-size:13px;
                background:#f3f3f3;
                color:#111;
                display:inline-block;
            ">
                {{ $o->status }}
            </span>
        </td>

        <td style="
            color:#111;
            font-size:14px;
        ">
            {{ $o->created_at }}
        </td>
    </tr>
    @endforeach
</table>

</div>

@endif

</section>

@endsection
