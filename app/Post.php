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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addComment($body)
    {
        /*
         * 第一种写法
         * Comment::create([
            'body' => $body,
            'post_id' => $this->id
        ]);*/
        //第二种写法
        $this->comments()->create(compact('body'));
    }

}
