<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    //protected $gurded=[];
    //protected $gurded=['id'];
    protected $fillable = ['title','intro','body'];

    protected $with=['catagory','author'];

    public function scopeFilter($query,$filter)//Blog::latest()->filter()
    {
        $query->when($filter['search']?? false,function($query,$search){
            $query->where(function($query) use ($search){
                $query->where('title', 'LIKE', '%'.$search.'%')
                    ->orWhere('body', 'LIKE', '%'.$search.'%');
            });
        });

        $query->when($filter['catagory'] ?? false, function ($query, $slug) {
            $query->whereHas('catagory',function($query) use ($slug)
            {
                $query->where('slug',$slug);
            });
        });

        $query->when($filter['username'] ?? false, function ($query, $username) {
            $query->whereHas('author', function ($query) use ($username) {
                $query->where('username', $username);
            });
        });
    }

    public function catagory()
    {
        //hasone , hasmany , belongTo , belongToMany
        return $this->belongsTo(Catagory::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class ,'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function subscribers()
    {
        return $this->belongsToMany(User::class,'blog_user');
    }

    public function unSubscribe()
    {
        $this->subscribers()->detach(auth()->id());
    }
    
    public function subscribe()
    {
        $this->subscribers()->attach(auth()->id());
    }
}


//logical grouping 

//(name = "mg mg" or name = "aung aung") and age > 20 