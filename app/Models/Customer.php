<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = [
                                'id',
                                'name',
                                'phone',
                                'email',
                                'address',
                                'created_by',
                                'updated_by',
                                'deleted_by',
                                'created_at',
                                'updated_at',
                                'deleted_at',
                            ];
}
