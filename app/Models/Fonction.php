<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fonction extends BaseModel
{

    public static function boot()
    {
        parent::boot();
    }

    protected $table = "fonctions";
    protected $guarded = ['id'];

}
