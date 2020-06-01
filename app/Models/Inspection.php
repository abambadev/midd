<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inspection extends BaseModel
{

    public static function boot()
    {
        parent::boot();
    }

    protected $table = "inspections";
    protected $guarded = ['id'];

}
