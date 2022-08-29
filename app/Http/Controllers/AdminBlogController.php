<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Catagory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminBlogController extends Controller
{
    public function index()
    {
        return view('admin.blogs.index',[
            'blogs'=>Blog::latest()->paginate(6)
        ]);
    }
    public  function create()
    {
        return view('blogs.create', [
            'catagories' => Catagory::all()
        ]);
    }
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', [
            'catagories' => Catagory::all(),
            'blog'=>$blog
        ]);
    }
    public  function store()
    {

        $formData = request()->validate([
            "title" =>  ['required'],
            "slug" => ['required', Rule::unique('blogs', 'slug')],
            "intro" => ['required'],
            "body" => ['required'],
            "catagory_id" => ['required', Rule::exists('catagories', 'id')]
        ]);
        $formData['user_id'] = auth()->id();
        $formData['thumbnail'] = request()->file('thumbnail')->store('thumbnails');;

        Blog::create($formData);

        return redirect('/');
    }

    public function update(Blog $blog)
    {
        $formData = request()->validate([
            "title" =>  ['required'],
            "slug" => ['required', Rule::unique('blogs', 'slug')->ignore($blog->id)],
            "intro" => ['required'],
            "body" => ['required'],
            "catagory_id" => ['required', Rule::exists('catagories', 'id')]
        ]);
        $formData['user_id'] = auth()->id();
        $formData['thumbnail'] = request()->file('thumbnail') ? request()->file('thumbnail')->store('thumbnails') : $blog->thumbnail;

        $blog->update($formData);

        return redirect('/');
    }

    public function destory(Blog $blog)
    {
        $blog->delete();

        return back();
    }


}
