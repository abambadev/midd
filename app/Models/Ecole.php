<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ecole extends BaseModel
{

    public static function boot()
    {
        parent::boot();
    }

    protected $table = "ecoles";
    protected $guarded = ['id'];

}
