<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'products',
        'total_price',
        'firstname',
        'surname',
        'street',
        'house',
        'city',
        'postal_code',
        'phone_number'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}