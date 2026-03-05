@extends('layouts.admin')

@section('content')

<h1 style="font-size:26px;margin-bottom:30px;">
    Chi tiết đơn hàng #{{ $order->id }}
</h1>

{{-- INFO ORDER --}}
<div style="
    background:#fff;
    padding:30px;
    border-radius:20px;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
    margin-bottom:40px;
">

    <div style="
        display:grid;
        grid-template-columns:1fr 1fr;
        gap:20px;
        margin-bottom:20px;
    ">
        <p><b>Người nhận:</b> {{ $order->receiver_name }}</p>
        <p><b>Số điện thoại:</b> {{ $order->receiver_phone }}</p>
        <p><b>Địa chỉ:</b> {{ $order->receiver_address }}</p>
    </div>

    <div style="
        display:grid;
        grid-template-columns:repeat(3,1fr);
        gap:20px;
        margin-top:20px;
    ">
        <div>
            <p style="color:#777;font-size:13px;">Tạm tính</p>
            <p style="font-weight:500;">{{ number_format($order->subtotal) }} đ</p>
        </div>

        <div>
            <p style="color:#777;font-size:13px;">Phí ship</p>
            <p style="font-weight:500;">{{ number_format($order->shipping_fee) }} đ</p>
        </div>

        <div>
            <p style="color:#777;font-size:13px;">Tổng tiền</p>
            <p style="
                font-weight:600;
                font-size:18px;
                color:#b58e3e;
            ">
                {{ number_format($order->total) }} đ
            </p>
        </div>
    </div>

</div>

{{-- UPDATE STATUS --}}
<div style="
    background:#fff;
    padding:30px;
    border-radius:20px;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
    margin-bottom:40px;
">

<h2 style="font-size:20px;margin-bottom:20px;">
    Cập nhật trạng thái đơn hàng
</h2>

<form method="POST" action="{{ route('admin.orders.updateStatus', $order->id) }}"
      style="display:flex;gap:20px;align-items:center;">
    @csrf

    <select name="status"
            style="
                padding:10px 14px;
                border-radius:10px;
                border:1px solid #ddd;
            ">
        <option value="pending" {{ $order->status=='pending' ? 'selected' : '' }}>Chờ xử lý</option>
        <option value="processing" {{ $order->status=='processing' ? 'selected' : '' }}>Đang xử lý</option>
        <option value="completed" {{ $order->status=='completed' ? 'selected' : '' }}>Hoàn thành</option>
        <option value="cancelled" {{ $order->status=='cancelled' ? 'selected' : '' }}>Huỷ</option>
    </select>

    <button class="btn btn-edit"
            style="
                padding:10px 22px;
                border-radius:20px;
                border:none;
                cursor:pointer;
            ">
        Cập nhật
    </button>
</form>

</div>

{{-- ORDER ITEMS --}}
<div style="
    background:#fff;
    padding:30px;
    border-radius:20px;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
">

<h2 style="font-size:20px;margin-bottom:20px;">
    Sản phẩm trong đơn
</h2>

<table style="
    width:100%;
    border-collapse:collapse;
    color:#111;
">
    <tr style="
        background:#f8f8f8;
        font-size:13px;
        color:#555;
    ">
        <th style="padding:14px;">Sản phẩm</th>
        <th>Ảnh</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Thành tiền</th>
    </tr>

    @foreach($items as $item)
    <tr style="border-bottom:1px solid #eee;">
        <td style="padding:16px;">
            {{ $item->name }}
        </td>

        <td>
            <img src="{{ asset('products/'.$item->image) }}"
                 style="
                    width:80px;
                    height:80px;
                    object-fit:contain;
                 ">
        </td>

        <td style="color:#b58e3e;">
            {{ number_format($item->price) }} đ
        </td>

        <td>{{ $item->qty }}</td>

        <td style="font-weight:500;">
            {{ number_format($item->line_total) }} đ
        </td>
    </tr>
    @endforeach
</table>

</div>

@endsection
