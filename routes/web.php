<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageUploadController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => '/user', 'as' => 'user.'], function () {
    Route::get('/list', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/', [UserController::class, 'store'])->name('store');
    Route::get('{user}/edit', [UserController::class, 'edit'])->name('edit');
    Route::put('{user}', [UserController::class, 'update'])->name('update');
    Route::delete('{user}', [UserController::class, 'destroy'])->name('delete');

    Route::group(['prefix' => '/image-upload', 'as' => 'image-upload.'], function () {
        Route::get('/list', [ImageUploadController::class, 'index'])->name('index');
        Route::get('/create', [ImageUploadController::class, 'create'])->name('create');
        Route::post('/', [ImageUploadController::class, 'store'])->name('store');
    });
});
