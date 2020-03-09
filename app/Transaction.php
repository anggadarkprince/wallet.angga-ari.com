<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    public function userSaving()
    {
        return $this->belongsTo(Saving::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->hasOneThrough(User::class, Saving::class, 'id', 'id', 'id_saving', 'id_user');
    }
}
