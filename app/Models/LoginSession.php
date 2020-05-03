<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginSession extends BaseModel
{
 
    public static function boot()
    {
        parent::boot(); 
    }

    protected $table = "login_session";
    protected $guarded = ['id'];  

}
