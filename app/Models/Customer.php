<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'customers';

    protected $fillable = [
        'id',
        'name',
        'phone',
        'email',
        'address',
        'password',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
