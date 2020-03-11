<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saving extends Model
{

    protected $fillable = ['saving_title', 'saving_type', 'account_name', 'account_number', 'currency', 'currency_symbol'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
