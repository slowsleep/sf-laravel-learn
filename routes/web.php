<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\MathController;
use App\Http\Controllers\TaskController;
use App\Services\MathService;

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

Route::get('math', [MathController::class, 'index']);

Route::get('math/add/{a}/{b}', function (MathService $math, $a, $b) {
    dd($math->add($a, $b));
});

Route::get('math/mult/{a}/{b}', function (MathService $math, $a, $b) {
    dd($math->mult($a, $b));
});

Route::get('math/pow/{a}/{b}', function (MathService $math, $a, $b) {
    dd($math->pow($a, $b));
});
