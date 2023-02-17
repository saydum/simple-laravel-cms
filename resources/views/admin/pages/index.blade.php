@extends('layout.admin')

@section('content')
<div class="mb-3">
    <a href="{{ route('crud.create') }}" class="btn btn-success" type="submit">Создать страницу</a>
</div>
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Module</th>
        <th scope="col">Controller</th>
        <th scope="col">Table</th>
      </tr>
    </thead>
    <tbody>

        @foreach ($pages as $c)
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
