<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /*
     * public static function incomplete()
    {
        return static::where('completed',0)->get();
    }
    */
    //相当于上面的方法
    public function scopeIncomplete($query)
    {
        return $query->where('completed',0);
    }
}
