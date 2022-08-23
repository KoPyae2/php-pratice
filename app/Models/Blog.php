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

    public function catagory()
    {
        //hasone , hasmany , belongTo , belongToMany
        return $this->belongsTo(Catagory::class);
    }

    public function author(){
        return $this->belongsTo(User::class ,'user_id');
    }
}
