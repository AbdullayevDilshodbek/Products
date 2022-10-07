<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAudit extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'old_title',
        'new_title',
        'old_price',
        'new_price',
        'old_amount',
        'new_amount',
        'product_id',
        'user_id',
        'date',
        'action'
    ];
}
