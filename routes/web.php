<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// ->name('index');を書かないと名前付きルートを使えない(navigation.bladeで定義するやつ)

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' =>['auth']],function(){
    Route::get('/', [PostController::class,'index'])->name('index');
    Route::post('/posts', [PostController::class,'store']);
    Route::get('/posts/create',[PostController::class,'create']);
    Route::get('/posts/{post}', [PostController::class,'show']);
    Route::put('/posts/{post}', [PostController::class,'update']);
    Route::delete('/posts/{post}', [PostController::class,'delete']);
    Route::get('/posts/{post}/edit', [PostController::class,'edit']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
