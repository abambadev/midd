<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{

    use Notifiable;
    use EntrustUserTrait {
        restore as private restoreA;
    }
    use SoftDeletes {
        restore as private restoreB;
    }

    protected $table = "users";
    protected $guarded = ['id'];

    public function restore()
    {
        $this->restoreA();
        $this->restoreB();
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    static function boot()
    {
        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
            $model->created_by = Auth::id();
            $model->updated_by = Auth::id();
        });

        static::updating(function ($model) {
            $model->updated_by = Auth::id();
        });

        static::deleting(function ($model) {
            $model->update(
                [
                    'deleted_by' => Auth::id(),
                ]
            );
        });

        parent::boot();
    }

    public function getPays()
    {
        return $this->belongsTo('App\Models\Pays', 'pays_id');
    }

    public function getLoginSession()
    {
        return $this->hasMany('App\Models\LoginSession', 'users_id');
    }

}
