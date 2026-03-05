@extends('layouts.admin')

@section('content')
<h2>Quản lý người dùng</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Email</th>
        <th>Quyền</th>
        <th></th>
    </tr>

    @foreach($users as $u)
    <tr>
        <td>{{ $u->id }}</td>
        <td>{{ $u->name }}</td>
        <td>{{ $u->email }}</td>
        <td>
            {{ $u->is_admin ? 'Admin' : 'User' }}
        </td>
        <td>
            <a class="btn btn-edit"
               href="{{ route('admin.users.toggleAdmin', $u->id) }}">
               Đổi quyền
            </a>
        </td>
    </tr>
    @endforeach
</table>
@endsection
