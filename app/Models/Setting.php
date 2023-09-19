<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'settings';
    protected $fillable = [
                                'id',
                                'name',
                                'email',
                                'address',
                                'online_phone',
                                'outline_phone',
                                'price_unit',
                                'suze_unit',
                                'logo_path',
                                'created_by',
                                'updated_by',
                                'deleted_by',
                                'created_at',
                                'updated_at',
                                'deleted_at',
                            ];
}
