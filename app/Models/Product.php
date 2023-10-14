<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
                                'width',
                                'height',
                                'depth',
                                'weight',
                                'description',
                                'thumbnail',
                                'created_by',
                                'updated_by',
                                'deleted_by',
                                'created_at',
                                'updated_at',
                                'deleted_at',
                            ];
    public function getCategory():BelongsTo{
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function getProductGallery():HasMany{
        return $this->hasMany(Gallery::class,'product_id','id');
    }
}
