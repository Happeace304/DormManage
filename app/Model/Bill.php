<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    public $timestamps=false;
    protected $primaryKey = 'billId';
    protected $table='bills';

    protected $fillable = [
        'roomId','state','month','note', 'total'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
    function room(){
        return $this->belongsTo(Room::class,'roomId','roomId');
    }
}
