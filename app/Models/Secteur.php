<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Secteur extends BaseModel
{

    public static function boot()
    {
        parent::boot();
    }

    protected $table = "secteurs";
    protected $guarded = ['id'];

}
