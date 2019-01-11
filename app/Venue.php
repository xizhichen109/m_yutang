<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    //黑名单
    protected $guarded = ["id"];

    // 判断当前场馆是否被关注
    public function isfollowed(){
        return (bool) Venue_user::where('user_id', \Auth::id())
            ->where('venue_id', $this->id)
            ->first();
    }


    // 场馆和价格的关系  一对多   一个场馆对应多个价格(不同时段价格)

    public function prices()
    {
        return $this->hasMany('App\Price');
    }

    // 一对多逆向
    public function type()
    {
        return $this->belongsTo('App\Type');
    }



}
