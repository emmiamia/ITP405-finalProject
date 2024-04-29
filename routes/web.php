<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IntroController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\personal\DiaryController;
use App\Http\Controllers\personal\FavoriteController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('welcome');
});


//diary-related methods
Route::middleware('guest')->group(function(){
    Route::get('/intro', [IntroController::class, 'index']);

    Route::get('/registration', [RegistrationController::class, 'showRegistrationForm'])->name('register');
    Route::post('/registration', [RegistrationController::class, 'register']);
    
    Route::get('/login',[LoginController::class, 'showLogin'])->name('login'); 
    Route::post('/login',[LoginController::class, 'login']); 
});

Route::middleware('auth')->group(function () {
        // Route for showing user's diary
    Route::get('/diary/{userId}', [DiaryController::class, 'show'])->name('user.diary');
    Route::get('/diaryCreate', [DiaryController::class, 'showCreate'])->name('diaries.create');
    Route::post('/diaryCreate', [DiaryController::class, 'store'])->name('diaries.store');
    Route::post('/diaries/{diaryId}/favorite', [DiaryController::class, 'addToFavorites'])->name('diaries.add_to_favorites');

    Route::get('/favorites/{userId}', [FavoriteController::class, 'index'])->name('user.favorite');
    Route::delete('/favorites/{favorite}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');
    Route::delete('/diaries/{diary}', [DiaryController::class, 'destroy'])->name('diaries.destroy');
    Route::put('/diaries/{diary}', [DiaryController::class, 'update'])->name('diaries.update');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('web');

    Route::get('/comments', [CommentController::class, 'showComment'])->name('comments');
    Route::post('/comments', [CommentController::class, 'store'])->name('commentPost')->middleware('auth');
    Route::get('/my-comments', [CommentController::class, 'myComments'])->name('my-comments');

    //edit comment
    Route::get('/comments/{id}/edit', [CommentController::class, 'showEdit'])->name('comments.edit');
    Route::put('/comments/{id}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');

});



