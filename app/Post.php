<?php

namespace App;

//Model继承自己的Model不是Eloquent下的,不必在每个模型中都添加保护字段
//use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //  protected $fillable = ['title','body'];
    //  protected $guarded = [];

    /*public function comments()
    {
        return $this->hasMany('App\Post');
    }*/


     //* 不同的写法
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
