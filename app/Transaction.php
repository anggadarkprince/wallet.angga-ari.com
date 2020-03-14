<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['saving_id', 'category_id', 'transaction_title', 'transaction_date', 'amount', 'location', 'attachment', 'description'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'transaction_date',
    ];

    public function getFormattedAmount($precision = 3, $trimmed = true, $dec_point = ',', $thousands_sep = '.')
    {
        $number = $this->attributes['amount'];

        if (empty($number)) {
            return 0;
        }
        $formatted = number_format($number, $precision, $dec_point, $thousands_sep);

        if (!$trimmed) {
            return $formatted;
        }

        // Trim unnecessary zero after comma: (2,000 -> 2) or (3,200 -> 3,2)
        return strpos($formatted, $dec_point) !== false ? rtrim(rtrim($formatted, '0'), $dec_point) : $formatted;
    }

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
