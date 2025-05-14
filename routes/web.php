<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function ()  {
     return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/posts/result', [PostController::class, 'result'])->name('result');
    Route::post('/posts', [PostController::class, 'store']);
    Route::get('/posts/posts', [PostController::class, 'posts']);
    Route::get('/posts/{post}', [PostController::class ,'show']);
    Route::delete('/posts/{post}', [PostController::class,'delete']);
    //Route::post('/posts/create/{title}/{body}/{func}/{start}/{end}/{response}', [PostController::class, 'post'])->name();
    //Route::post('/posts/posts', [PostController::class, 'destroy'])->name();
});

require __DIR__.'/auth.php';
