@extends('layout.admin')

@section('content')
<form action="{{ route('crud.update') }}" method="post">
    @csrf
    <div class="mb-3">
        <label  class="form-label">Module</label>
        <input name="model_name" type="text" class="form-control" value="{{ $crud->model_name }}">
    </div>

    <div class="mb-3">
        <label  class="form-label">Controller </label>
        <input name="controller" type="text" class="form-control" value="{{ $crud->controller }}">
    </div>

    <div class="mb-3">
        <label  class="form-label">Table </label>
        <input name="table" type="text" class="form-control" value="{{ $crud->table }}">
    </div>
</form>
@endsection
