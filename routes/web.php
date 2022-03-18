<?php

use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/auth/registerSubmit',[UserController::class,'registerSubmit'])->name('register.submit');
Route::post('/auth/authCheck',[UserController::class,'authCheck'])->name('auth.check');
Route::get('/auth/logoutSubmit',[UserController::class,'logoutSubmit'])->name('auth.logout');
Route::post('addPostSubmit',[PostController::class,'addPost'])->name('add-post.submit');
Route::get('/delete-post/{id}',[PostController::class,'deletePost'])->name('delete.post');
Route::post('/edit-postSub',[PostController::class,'editPostSubmit'])->name('editSub.post');
Route::post('/edit-userSub',[UserController::class,'editUSerSubmit'])->name('edit-user.Sub');
Route::get('/',[UserController::class,'dashboard'])->name('dashboard');

Route::group(['middleware'=>['Auth.Check']],function (){
    Route::get('/auth/login',[UserController::class,'login'])->name('login');
    Route::get('/auth/register',[UserController::class,'register'])->name('register');
    Route::get('/add-post',[UserController::class,'addPost'])->name('add.post');
    Route::get('/edit-post',[PostController::class,'editPost'])->name('edit.post');
    Route::get('/full-post/{id}',[PostController::class,'fullPost'])->name('full.post');
    Route::get('/edit-user',[UserController::class,'editUser'])->name('edit.user');
    Route::get('/store-post',[LikeController::class,'store_PostID'])->name('store-post.id');

});

