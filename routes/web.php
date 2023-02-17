<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\DashboardController;
use App\Models\Crud;



Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// CRUD Controller
Route::resource('crud', CrudController::class);

// foreach(Crud::all() as $crud) {
//     Route::resource($crud->model, $crud->controller."::class");
// }

