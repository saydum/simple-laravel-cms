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
        <label  class="form-label">Связать с модулем </label>
        <select name="module_id" class="form-select form-control" aria-label="Default select example">
            <option value="0" selected>Создать страницу внутри CMS</option>
            @foreach(\App\Models\Module::all() as $module)
                <option value="{{ $module->id  }}">
                    {{ $module->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <button class="btn btn-success" type="submit">Save</button>
    </div>
</form>
@endsection
