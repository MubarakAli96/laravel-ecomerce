<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sub_Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "sub_categories";
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'status',


    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
