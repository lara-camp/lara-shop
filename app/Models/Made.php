<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Made extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'mades';
    protected $fillable = [
                                'id',
                                'name',
                                'created_by',
                                'updated_by',
                                'deleted_by',
                                'created_at',
                                'updated_at',
                                'deleted_at',
                            ];
}
