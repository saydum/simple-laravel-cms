@extends('layout.admin')

@section('content')
<form action="{{ route('crud.store') }}" method="post">

    @csrf

    <div class="mb-3">
        <label  class="form-label">Module</label>
        <input name="model_name" type="text" class="form-control"  placeholder="Product">
    </div>

    <div class="mb-3">
        <label  class="form-label">Controller </label>
        <input name="controller" type="text" class="form-control"  placeholder="Product">
    </div>

    <div class="mb-3">
        <label  class="form-label">Table </label>
        <input name="table" type="text" class="form-control"  placeholder="products">
    </div>
    <div class="mb-3">
        <button class="btn btn-success" type="submit">Save</button>
    </div>
</form>
@endsection
