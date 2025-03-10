<?php

use App\Http\Controllers\Api\CategoryController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//get all categories
// Route::get('categories', function () {})->name('categories.index');
// categories create form
// Route::get('categories/create', function () {})->name('categories.create');
// categories Store
// Route::post('categories/store', function () {})->name('categories.store');
// view a single categories
// Route::get('categories/{category}', function (Category $category) {})->name('categories.show');
// edit categories
// Route::get('categories/{category}/edit', function (Category $category) {})->name('categories.edit');;
// update categories
// Route::put('categories/{category}', function (Category $category) {})->name('categories.update');;
// delete categories
// Route::delete('categories/{category}', function (Category $category) {})->name('categories.delete');;

//Resource Route
//----------------------
// Route::resource('categories', CategoryController::class);
