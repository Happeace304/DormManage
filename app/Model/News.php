<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $primaryKey = 'newsId';
    protected $table='news';
    protected $fillable = [
        'Title','state','Content','slug'
    ];

}
