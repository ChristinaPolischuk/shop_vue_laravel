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

Route::group(['prefix' => 'tags'], function() {
  Route::get('/', \App\Http\Controllers\Tag\IndexController::class)->name('tag.index');
  Route::get('/create', \App\Http\Controllers\Tag\CreateController::class)->name('tag.create');
  Route::post('/', \App\Http\Controllers\Tag\StoreController::class)->name('tag.store');
  Route::get('/{tag}/edit', \App\Http\Controllers\Tag\EditController::class)->name('tag.edit');
  Route::get('/{tag}', \App\Http\Controllers\Tag\ShowController::class)->name('tag.show');
  Route::patch('/{tag}', \App\Http\Controllers\Tag\UpdateController::class)->name('tag.update');
  Route::delete('/{tag}', \App\Http\Controllers\Tag\DeleteController::class)->name('tag.delete');
});

Route::group(['prefix' => 'colors'], function() {
  Route::get('/', \App\Http\Controllers\Color\IndexController::class)->name('color.index');
  Route::get('/create', \App\Http\Controllers\Color\CreateController::class)->name('color.create');
  Route::post('/', \App\Http\Controllers\Color\StoreController::class)->name('color.store');
  Route::get('/{color}/edit', \App\Http\Controllers\Color\EditController::class)->name('color.edit');
  Route::get('/{color}', \App\Http\Controllers\Color\ShowController::class)->name('color.show');
  Route::patch('/{color}', \App\Http\Controllers\Color\UpdateController::class)->name('color.update');
  Route::delete('/{color}', \App\Http\Controllers\Color\DeleteController::class)->name('color.delete');
});