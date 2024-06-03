<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowerController;


use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts',[PostController::class, 'index'])->name('posts.index');

/////////////////////////  routes login
 Route::get('/login',[AuthController::class, 'login'])->name('auth.login');
 Route::post('/login',[AuthController::class, 'loginstore'])->name('login.store');
 //////////////////////// routes register 

 Route::get('/register',[AuthController::class, 'register'])->name('auth.register');
 Route::post('/register', [AuthController::class, 'registerstore'])->name('register.store');
 
 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



////////////////////     show all posts for admin

Route::get('/posts/showall',[PostController::class, 'showall'])->name('posts.showall');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

Route::delete('/posts/{post}',[PostController::class, 'destroy'])->name('posts.destroy');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// create posts 
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
// store post data to db
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
// to show the time line 
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//  profile page after signin

Route::get('/profile',[Usercontroller::class,'show_user'])->name('pages.profile');



//1- structure change for database (create table , edit column , remove column)
//2- operations on database (insert record, edit record, delete record)

//        for follower
Route::post('/follow/{userId}', [FollowerController::class, 'follow'])->name('follow');
Route::delete('/unfollow/{userId}', [FollowerController::class, 'unfollow'])->name('unfollow');
