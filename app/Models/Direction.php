<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Direction extends BaseModel
{

    public static function boot()
    {
        parent::boot();
    }

    protected $table = "directions";
    protected $guarded = ['id'];

}
