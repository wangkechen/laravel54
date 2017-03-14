<?php

namespace App;
Use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

//Model继承自己的Model不是Eloquent下的,不必在每个模型中都添加保护字段
//use Illuminate\Database\Eloquent\Model;

class Post extends Cmodel
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
        $user_id = Auth::user()->id;
        $this->comments()->create(compact('body','user_id'));
    }

    public function scopeFilter($query, $filters)
    {
        if ($month = $filters['month']){
            $query->whereMonth('created_at',Carbon::parse($month)->month);
        }

        if ($year = $filters['year']){
            $query->whereYear('created_at', $year);
        }

    }

    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year','month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

}
