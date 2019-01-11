<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    /*
     * 白名单: 哪些字段容许添加;
    protected $fillable = [
        'name', 'email', 'password',
    ];

    */


    // 黑名单: 哪些字段不容插入数据;

    protected $guarded = ["id"];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // User.php   Venue.php  多对多

    public function venues(){
        return $this->belongsToMany('App\Venue');
    }



}
