<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
use App\Models\Crud;

// CRUD Controller
Route::resource('crud', CrudController::class);

foreach(Crud::all() as $crud) {
    Route::resource(strtolower($crud->model_name), $crud->controller."::class");
}

