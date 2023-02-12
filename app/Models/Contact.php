<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Contact extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'last_name',
        'phone',
        'sujet',
        'message',
        'email',
    ];
}
