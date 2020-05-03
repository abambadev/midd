<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pays extends BaseModel
{
 
    public static function boot()
    {
        parent::boot(); 
    }

    protected $table = "pays";
    protected $guarded = ['id'];  

}
