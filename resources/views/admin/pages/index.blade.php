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
        <th scope="col">Slug</th>
      </tr>
    </thead>
    <tbody>

        @foreach ($pages as $page)
        <tr>
            <th scope="row">{{ $page->id }}</th>
            <td>{{ $page->model_name }}</td>
            <td>{{ $page->controller }}</td>
            <td>{{ $page->table }}</td>
            <td>
                <a href="/{{ $page->slug }}">Перейти</a>
            </td>
        </tr>
        @endforeach

    </tbody>
  </table>

@endsection
