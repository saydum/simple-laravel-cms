<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\RedirectResponse;

class ModuleCreateController extends Controller
{
    public function create(): View
    {
        return view('admin.modules.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Artisan::call("module:make {$request->input('module_name')}");
        Module::create($request->all());
        return redirect()->route('dashboard');
    }
}
