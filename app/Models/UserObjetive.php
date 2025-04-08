<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserObjetive extends Model
{
    protected $fillable = [
        'objetive',
        'user_id'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
    