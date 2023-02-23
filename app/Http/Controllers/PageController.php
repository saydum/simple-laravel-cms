<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Page;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.pages.index', ['pages' => Page::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'model_name' => 'required|unique:pages|min:2|max:55',
            'controller' => 'required|unique:pages|min:2|max:55',
            'table' => 'required|unique:pages|min:2|max:55',
            'module_id' => 'max:1000',
        ]);



        if ($validated ) {
            if ($request->input('module_id') === 0) {
                Artisan::call("make:model {$request->input('model_name')} -cm --resource");
            } else {
                $module = Module::find($request->input('module_id'));
                Artisan::call("module:make-model {$request->input('model_name')} {$module->name} -m");
                Artisan::call("module:make-controller {$request->input('model_name')}Controller {$module->name} --api");

                // $request->input('model_name')}/Resources/views/index.blade.php
            }

            Page::create([
                'model_name' => $request->model_name,
                'controller' => $request->controller,
                'table' => $request->table,
                'module_id' => $request->module_id,
                'slug' => strtolower($request->controller),
            ]);
        }
        return redirect()->route('crud.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $pagerud): View
    {
        return view('admin.pages.show', ['crud' => $pagerud]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $pagerud): View
    {
        return view('admin.pages.edit', ['crud' => $pagerud]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $pagerud): RedirectResponse
    {
        $validated = $request->validate([
            'model_name' => 'required|unique:pages|min:2|max:55',
            'controller' => 'required|unique:pages|min:2|max:55',
            'table' => 'required|unique:pages|min:2|max:55'
        ]);

        if ($validated) {
            $pagerud->update($request->all());
        }
        return redirect()->route('crud.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $pagerud): RedirectResponse
    {
        $pagerud->delete();
        return redirect()->route('crud.index');
    }
}
