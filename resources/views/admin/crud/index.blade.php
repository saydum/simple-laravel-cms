@extends('layout.admin')

@section('content')

<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Module</th>
        <th scope="col">Controller</th>
        <th scope="col">Table</th>
      </tr>
    </thead>
    <tbody>

        @foreach ($cruds as $c)
        <tr>
            <th scope="row">{{ $c->id }}</th>
            <td>{{ $c->model_name }}</td>
            <td>{{ $c->controller }}</td>
            <td>{{ $c->table }}</td>
        </tr>
        @endforeach

    </tbody>
  </table>

@endsection
