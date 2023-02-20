<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ModuleCreateController;
use App\Models\Page;



Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/pages', [DashboardController::class, 'pages'])->name('pages');
Route::get('/module-create', [ModuleCreateController::class, 'create'])->name('module.create');
Route::post('/module-create', [ModuleCreateController::class, 'store'])->name('module.store');


// CRUD Controller
Route::resource('crud', PageController::class);

// foreach(Page::all() as $crud) {
//     Route::resource($crud->model, $crud->controller."::class");
// }


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
