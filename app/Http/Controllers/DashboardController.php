<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', ['cruds' => Crud::all()]);
    }

    public function pages(): View
    {
        return view('admin.pages.index', ['cruds' => Crud::all()]);
    }
}
