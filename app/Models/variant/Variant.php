<?php

namespace App\Models\variant;

use App\Models\product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Variant extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $table = 'product_variants';
    protected  $fillable = [
        'product_id',
        'name',
        'slug',
        'sku',
        'price',
        'qty',
        'status'
    ];

    public function  products(): BelongsTo
    {
         $this->belongsTo(Product::class, 'product_id');
    }
}
