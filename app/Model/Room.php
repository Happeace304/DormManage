<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public $timestamps=false;
    protected $primaryKey = 'roomId';
    protected $table='rooms';
    protected $fillable = [

       'roomName','state','type','peopleCount'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
    function  user(){
        return $this->hasMany('App/User','roomId','roomId');
    }
}
