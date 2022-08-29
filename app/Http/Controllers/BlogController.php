<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\Catagory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule as ValidationRule;

class BlogController extends Controller
{
    public function index() {
        // dd(auth()->user()->can('admin'));
        // dd(Gate::allows('admin'));
        // dd($this->authorize('admin'));
        // $this->authorize('admin');  // is not admin direct go 403
        return view('blogs.index',[
            'blogs'=>Blog::latest()
                    ->filter(request(['search','catagory','username']))
                    ->paginate(3)
                    ->withQueryString()
        ]);
    }

    public function show(Blog $blog){
        return view('blogs.show',[
            'blog' => $blog,
            'randomBlogs'=>Blog::inRandomOrder()->take(3)->get()
        ]);
    }

    // protected function getBlogs(){
    //     // $query = Blog::latest();
    //     // if (request('search')) {
    //     //     $blogs = $blogs->where('title', 'LIKE', '%'.request('search').'%')
    //     //                    ->orWhere('body', 'LIKE', '%'.request('search').'%');
    //     // }
    //     // $query->when(request('search'),function($query,$search){
    //     //     $query->where('title', 'LIKE', '%'. $search.'%')
    //     //           ->orWhere('body', 'LIKE', '%'. $search.'%');
    //     // });
    //     // return $query->get();


    //     return Blog::latest()->filter()->get();
    // }

    public function subscription(Blog $blog)
    {
        //if user subscriped or not
        if(User::find(auth()->id())->isSubscribed($blog)){
            $blog->unSubscribe();
        }else{
            $blog->subscribe();
        }
        return redirect('/blogs/'.$blog->slug);
    }
}
