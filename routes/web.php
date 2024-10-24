<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    PostController,
    MarkController,
    MathController,
    TaskController
};
use App\Services\MathService;

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('post', PostController::class);
Route::get('mark', [MarkController::class, 'index'])->name('mark');
Route::resource('task', TaskController::class)->only(['index', 'store', 'edit', 'update', 'destroy'])->middleware('dblog');

Route::get('/math', [MathController::class, 'index']);
Route::get('math/add/{a}/{b}', function (MathService $math, $a, $b) {
    dd($math->add($a, $b));
});
Route::get('math/mult/{a}/{b}', function (MathService $math, $a, $b) {
    dd($math->mult($a, $b));
});
Route::get('math/pow/{a}/{b}', function (MathService $math, $a, $b) {
    dd($math->pow($a, $b));
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
