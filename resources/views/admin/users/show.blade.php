@extends('layout.admin')

@section('content')
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Имя</th>
            <th scope="col">Email</th>
            <th scope="col">Роли</th>
            <th scope="col">Дата регистраций</th>
            <th scope="col">Управление</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>Root</td>
            <td>{{ $user->created_at }}</td>
        </tr>
    </tbody>
</table>
@endsection
