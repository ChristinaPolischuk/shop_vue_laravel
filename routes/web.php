<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Http\Controllers\Main\IndexController::class)->name('main.index');

Route::group(['prefix' => 'categories'], function() {
  Route::get('/', \App\Http\Controllers\Category\IndexController::class)->name('category.index');
  Route::get('/create', \App\Http\Controllers\Category\CreateController::class)->name('category.create');
  Route::post('/', \App\Http\Controllers\Category\StoreController::class)->name('category.store');
  Route::get('/{category}/edit', \App\Http\Controllers\Category\EditController::class)->name('category.edit');
  Route::get('/{category}', \App\Http\Controllers\Category\ShowController::class)->name('category.show');
  Route::patch('/{category}', \App\Http\Controllers\Category\UpdateController::class)->name('category.update');
  Route::delete('/{category}', \App\Http\Controllers\Category\DeleteController::class)->name('category.delete');

});