<?php

use App\Http\Controllers\Backend\BackendController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::group([AdminMiddleware::class,"handle"], function () {

    Route::get('/admin',[BackendController::class,'index'])->name('admin.index');
    Route::get('/userlist',[BackendController::class,'userList'])->name('admin.userlist');
    Route::get('/user-about/{users}',[BackendController::class,'userAbout'])->name('admin.userabout');
    Route::get('/platforms/{platforms}',[BackendController::class,'platformsAbout'])->name('admin.platformsAbout');
    Route::get('/platforms-list',[BackendController::class,'platformList'])->name('admin.platformslist');
    Route::get('/comments-list',[BackendController::class,'commentsList'])->name('admin.commentslist');
    Route::get('/categori-list',[BackendController::class,'categoriesList'])->name('admin.categorieslist');
    Route::get('/categori-add',[BackendController::class,'categoriesAdd'])->name('admin.categoriesadd');
    Route::post('/categori-add',[BackendController::class,'categoriesCreate'])->name('admin.categoriescreate');
    Route::get('/categori-update/{kategori}',[BackendController::class,'categoriesEdit'])->name('admin.categoriesedit');
    Route::post('/categori-update/{kategori}',[BackendController::class,'categoriesUpdate'])->name('admin.categoriesupdate');    
    Route::get('/categori-delete/{kategori}',[BackendController::class,'categoriesDelete'])->name('admin.categoriesdelete');  
    Route::get('/contact-list',[BackendController::class,'contactList'])->name('admin.contactlist');
    Route::get('/contact-delete/{contact}',[BackendController::class,'contactDelete'])->name('admin.contactdelete');
    Route::get('/comments-update/{comments}',[BackendController::class,'commentsEdit'])->name('admin.commentsedit');
    Route::post('/comments-update/{comments}',[BackendController::class,'commentsUpdate'])->name('admin.commentsupdate');
    Route::get('/platforms-update/{platforms}',[BackendController::class,'platformsEdit'])->name('admin.platformsedit');
    Route::post('/platforms-update/{platforms}',[BackendController::class,'platformsUpdate'])->name('admin.platformsupdate');
    Route::get('/contact-update/{contact}',[BackendController::class,'contactEdit'])->name('admin.contactedit');
    Route::post('/contact-update/{contact}',[BackendController::class,'contactUpdate'])->name('admin.contactupdate');
});