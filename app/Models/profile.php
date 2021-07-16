<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $fillable = [
        'profile',
        'user_id'
        ];
        
    public function user()
    {
        return $this->belongsTo('App\Models\User', "user_id", "id");
    }
}
