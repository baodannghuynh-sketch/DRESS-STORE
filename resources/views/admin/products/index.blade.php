@extends('layouts.admin')

@section('content')
<h2>Danh sách sản phẩm</h2>

<a href="{{ route('admin.products.create') }}" class="btn btn-add">+ Thêm sản phẩm</a>

<table>
    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Giá</th>
        <th>Ảnh</th>
        <th>Hành động</th>
    </tr>
    @foreach($products as $p)
    <tr>
        <td>{{ $p->id }}</td>
        <td>{{ $p->name }}</td>
        <td>{{ number_format($p->price) }} đ</td>
        <td>
            @if($p->image)
                <img src="{{ asset('products/'.$p->image) }}" width="120">
            @else
                <span>Không có ảnh</span>
            @endif
        </td>

        <td>
            <a href="{{ route('admin.products.edit', $p->id) }}" class="btn btn-edit">Sửa</a>
            <a href="{{ route('admin.products.disable', $p->id) }}"
                class="btn btn-warning"
                onclick="return confirm('Ngừng bán sản phẩm này?')">
                Ngừng bán
            </a>
            @if($p->is_active)
                <span class="badge bg-success">Đang bán</span>
            @else
                <span class="badge bg-secondary">Ngừng bán</span>
            @endif


        </td>
    </tr>
    @endforeach
</table>
@endsection
