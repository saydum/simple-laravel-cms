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
        @foreach ($users as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td class="text-danger">
                @foreach($user->roles as $role) {{ $role->name }} @endforeach
            </td>
            <td>{{ $user->created_at }}</td>
            <td class="text-end">
            <a class="btn text-success" href="{{ route('users.show', $user->id) }}">
                Открыть
            </a>
            <form style="display: inline-block" action="{{ route('users.destroy', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn text-danger" type="submit" onclick="alert('Подтвердите действие'); return true;">
                    Удалить
                </button>
            </form>
            </td>
        </tr>
        @endforeach

    </tbody>
  </table>
@endsection
