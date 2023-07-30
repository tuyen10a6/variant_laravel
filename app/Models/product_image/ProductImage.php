<?php

namespace App\Models\product_image;

use App\Models\product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class ProductImage extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $table = 'product_images';
    protected  $fillable = [
        'product_id',
        'path',
        'type',
        'name'
    ];

    public function  products(): HasOne
    {
        return  $this->hasOne(Product::class);
    }
}
