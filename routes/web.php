<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', [HomeController::class, 'index']);

Route::get('about', function () {
    dd("about");
});

Route::resource('post', PostController::class);

Route::get('mark', [MarkController::class, 'index'])->name('mark');

Route::resource('task', TaskController::class)->only(['index', 'store', 'edit', 'update', 'destroy']);
