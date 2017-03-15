<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Cmodel
{
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    //默认返回tag的id，重写后返回tag的name  例如posts/tags/personal
    public function getRouteKeyName()
    {
        return 'name';
    }
}
