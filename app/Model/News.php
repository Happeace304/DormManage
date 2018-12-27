<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $primaryKey = 'newsId';
    protected $table='news';
    protected $fillable = [
        'title','state','content','slug','imgLink','userId'
    ];

}
