<?php

use App\Models\Blog;
use App\Models\Catagory;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $blogs = Blog::latest();
    if(request('search')){
        $blogs = $blogs->where('title', 'LIKE' ,'%'.request('search').'%');
    }
    
    return view('blogs',[
        'blogs'=>$blogs->get(),
        'catagories'=>Catagory::all(),
    ]);
});

Route::get('/welcome', function () {
    return ["statue"=>0,"err_code"=>0,"err_msg"=>"success"];
});

Route::get('blogs/{blog:slug}',function(Blog $blog){ 
    return view('blog',[
        'blog' => $blog,
        'randomBlogs'=>Blog::inRandomOrder()->take(3)->get()
    ]);
})->where('blog',"[A-z0-9\-_]+");

Route::get('/catagories/{catagory:slug}',function(Catagory $catagory){
    $blogs = $catagory->blogs;
    
    if(request('search')){
        $blogs = $blogs->where('title', 'LIKE' ,'%'.request('search').'%');
    }
    return view('blogs',[
        'blogs'=>$blogs,
        'catagories' => Catagory::all(),
        'curCatagory'=>$catagory
    ]);
});

Route::get('/users/{name:username}', function (User $name) {
    $blogs = $name->blogs;
    
    if (request('search')) {
        $blogs = $blogs->where('title','LIKE','%'.request('search').'%');
    }
    return view('blogs', [
        'blogs' => $blogs,
        'catagories' => Catagory::all()
    ]);
});
