<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Cart extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'carts';
    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'address',
        'menu_name',
        'quantity',
        'price',
        'total_price',
        'date_reserv',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
