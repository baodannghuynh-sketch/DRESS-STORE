@extends('layouts.app')

@section('content')
<h2>Đơn hàng của tôi</h2>

@if($orders->count() == 0)
    <p>Bạn chưa có đơn hàng nào.</p>
@else
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>Mã đơn</th>
        <th>Tổng tiền</th>
        <th>Trạng thái</th>
        <th>Ngày đặt</th>
    </tr>

    @foreach($orders as $o)
    <tr>
        <td>#{{ $o->id }}</td>
        <td>{{ number_format($o->total) }} đ</td>
        <td>{{ $o->status }}</td>
        <td>{{ $o->created_at }}</td>
    </tr>
    @endforeach
</table>
@endif
@endsection
