<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
                                'id',
                                'category_id',
                                'name',
                                'price',
                                'stock',
                                'made',
                                'description',
                                'thumbnail',
                                'created_by',
                                'updated_by',
                                'deleted_by',
                                'created_at',
                                'updated_at',
                                'deleted_at',
                            ];
}
