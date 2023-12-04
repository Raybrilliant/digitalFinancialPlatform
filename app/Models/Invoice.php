<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    use HasFactory;        
    protected $fillable = [
        'product_id',
        'user_id',
        'order_number',
        'variant',
        'note',
        'amount'
    ];

    function Product() : BelongsTo{
        return $this->belongsTo(Product::class,'product_id');
    }
    function user() : BelongsTo {
        return $this->belongsTo(User::class,'user_id');
    }
}
