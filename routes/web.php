<?php

use App\Models\Blog;
use App\Models\User;
use App\Models\Comment;
use App\Models\Catagory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminBlogController;

/*
|------------------------------------------------------------------------------
| Web Routes
|------------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [BlogController::class,'index']);

Route::get('blogs/{blog:slug}',[BlogController::class,'show']);
Route::post('blogs/{blog:slug}/comments',[CommentController::class,'store']);

Route::get('register', [AuthController::class, 'create'])->middleware('guest');
Route::post('register', [AuthController::class, 'store'])->middleware('guest');

Route::post('logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('login', [AuthController::class, 'login'])->middleware('guest');
Route::post('login', [AuthController::class, 'post_login'])->middleware('guest');

Route::post('/blogs/{blog:slug}/subscription',[BlogController::class,'subscription']);


//Admin

Route::get('/admin/blogs',[AdminBlogController::class,'index'])->middleware('can:admin');  //use gate authorize
Route::get('/admin/blogs/create', [AdminBlogController::class, 'create'])->middleware('admin'); //use custom middleware
Route::get('/admin/blogs/{blog:id}/edit', [AdminBlogController::class, 'edit'])->middleware('admin');
Route::post('/admin/blogs/store', [AdminBlogController::class, 'store'])->middleware('admin');

Route::delete('/admin/blogs/{blog:id}/delete', [AdminBlogController::class, 'destory'])->middleware('admin');
Route::patch('/admin/blogs/{blog:id}/update', [AdminBlogController::class, 'update'])->middleware('admin');