<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use App\Models\Crud;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', ['cruds' => Crud::all()]);
    }
}
