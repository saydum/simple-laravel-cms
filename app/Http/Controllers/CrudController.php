<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.crud.index', ['cruds' => Crud::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.crud.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'model_name' => 'required|unique:cruds|min:2|max:55',
            'controller' => 'required|unique:cruds|min:2|max:55',
            'table' => 'required|unique:cruds|min:2|max:55'
        ]);

        if ($validated) {
            Artisan::call("make:model {$request->input('model_name')} -cm --resource");
            Crud::create($request->all());
        }
        return redirect()->route('crud.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Crud $crud): View
    {
        return view('admin.crud.show', ['crud' => $crud]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Crud $crud): View
    {
        return view('admin.crud.edit', ['crud' => $crud]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Crud $crud): RedirectResponse
    {
        $validated = $request->validate([
            'model_name' => 'required|unique:cruds|min:2|max:55',
            'controller' => 'required|unique:cruds|min:2|max:55',
            'table' => 'required|unique:cruds|min:2|max:55'
        ]);

        if ($validated) {
            $crud->update($request->all());
        }
        return redirect()->route('crud.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Crud $crud): RedirectResponse
    {
        $crud->delete();
        return redirect()->route('crud.index');
    }
}
