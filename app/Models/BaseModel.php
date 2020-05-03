<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class BaseModel extends Model
{

    use SoftDeletes;

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
            $model->update([
                'deleted_by' => Auth::id(),
            ]);
        });

        parent::boot();
    }
    
}