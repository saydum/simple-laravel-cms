<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', ['pages' => Page::all()]);
    }

    public function pages(): View
    {
        return view('admin.pages.index', ['pages' => Page::all()]);
    }
}
