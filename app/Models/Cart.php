<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'products_id',
        'quantity',
        'color',
        'size'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
