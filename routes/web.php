<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\InterFace\CommentController;
use App\Http\Controllers\InterFace\HomeController;
use App\Http\Controllers\InterFace\PlatformController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/login',[AuthController::class,'loginShow'])->name('login.show');
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::get('/register',[AuthController::class,'registerShow'])->name('register.show');
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::get('/user-logout',[AuthController::class,'Userlogout'])->name('Userlogout');


Route::get('/', [PlatformController::class,'index'])->name('home');
Route::get('/contact', [HomeController::class,'contact'])->name('contact');
Route::get('/about', [HomeController::class,'about'])->name('about');

Route::post('/contact', [HomeController::class,'contactSubmit'])->name('contact.submit');


Route::get('/user-platform', [PlatformController::class,'userPlatform'])->name('user.platform');
Route::get('/create-platform', [PlatformController::class,'createPlatform'])->name('create.platform');
Route::post('/create-platform', [PlatformController::class,'storePlatform'])->name('store.platform');
Route::get('/update-platform/{platform}', [PlatformController::class,'editPlatform'])->name('edit.platform');
Route::post('/update-platform/{platform}', [PlatformController::class,'updatePlatform'])->name('update.platform');
Route::get('/delete-platform/{platform}', [PlatformController::class,'deletePlatform'])->name('delete.platform');


Route::get('/platform-comment/{id}', [CommentController::class,'CommentShow'])->name('comment.show');

Route::post('/platform-comment-create/{platform}', [CommentController::class,'CommentCreate'])->name('comment.create');

Route::get('platform-comment-edit/{id}', [CommentController::class,'CommentEdit'])->name('comment.edit');
Route::post('platform-comment-edit/{id}', [CommentController::class,'CommentUpdate'])->name('comment.update');

Route::get('platform-comment-delete/{comment}',[CommentController::class,'CommentDelete'])->name('comment.delete');


Route::post('platform-filter', [PlatformController::class,'categoryFilter'])->name('category.filter');


Route::get('profile/{id}',[HomeController::class,'Profile'])->name('profile');
Route::post('profile/update/{user}', [HomeController::class,'ProfileUpdate'])->name('profile.update');


Route::get('users-platforms-comment/{user}', [PlatformController::class,'UsersPlatformComment'])->name('users.platform.comment');


Route::get('users-contacts/{contacts}', [HomeController::class,'contactsEdit'])->name('users.contacts.edit');
Route::post('users-contacts/{contacts}', [HomeController::class,'contactsUpdate'])->name('users.contacts.update');
