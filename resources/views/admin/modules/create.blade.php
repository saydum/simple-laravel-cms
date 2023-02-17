@extends('layout.admin')

@section('content')
<form action="{{ route('module.store') }}" method="post">

    @csrf

    <div class="mb-3">
        <label  class="form-label">Module</label>
        <input name="name" type="text" class="form-control"  placeholder="Product">
    </div>
    <div class="mb-3">
        <button class="btn btn-success" type="submit">Save</button>
    </div>
</form>
@endsection
