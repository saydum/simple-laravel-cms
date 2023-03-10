<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ModuleCreateController;
use App\Models\Page;


Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/pages', [DashboardController::class, 'pages'])->name('pages');
    Route::get('/module-create', [ModuleCreateController::class, 'create'])->name('module.create');
    Route::post('/module-create', [ModuleCreateController::class, 'store'])->name('module.store');

    Route::resource('/users', UserController::class);

// CRUD Controller
    Route::resource('crud', PageController::class);

// foreach(Page::all() as $pagerud) {
//     Route::resource($pagerud->model, $pagerud->controller."::class");
// }

});


Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');
