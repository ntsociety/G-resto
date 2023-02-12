<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menus';
    protected $fillable = [
        'cate_id',
        'name',
        'slug',
        'description',
        'price',
        'image',
        'special',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'cate_id', 'id');
    }
}
