@extends('layouts.admin')

@section('content')
<h2>Quản lý đơn hàng</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Khách hàng</th>
        <th>Email</th>
        <th>Tổng tiền</th>
        <th>Trạng thái</th>
        <th>Ngày đặt</th>
        <th></th>
    </tr>

    @foreach($orders as $o)
    <tr>
        <td>#{{ $o->id }}</td>
        <td>{{ $o->receiver_name }}</td>
        <td>{{ $o->email }}</td>
        <td>{{ number_format($o->total) }} đ</td>
        <td>{{ $o->status }}</td>
        <td>{{ $o->created_at }}</td>
        <td>
            <a class="btn btn-edit"
               href="{{ route('admin.orders.detail', $o->id) }}">
                Xem
            </a>
        </td>
    </tr>
    @endforeach
</table>
@endsection
