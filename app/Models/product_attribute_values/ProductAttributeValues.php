<?php

namespace App\Models\variant;

use App\Models\product\Product;
use App\Models\product\product_attribute_values;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


class ProductAttributeValues extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $table = 'product_attribute_values';
    protected  $fillable = [
        'product_id',
        'product_variant_id',
        'attribute_value_id',
        'attribute_key'
    ];

    public  function products(): BelongsTo
    {
         $this->BelongsTo(Product::class, 'product_id');
    }

    public  function  variants(): BelongsTo
    {
        $this->BelongsTo(Variant::class, 'product_variant_id');
    }

    public  function ProductAttributeValues(): BelongsTo
    {
        $this->BelongsTo(ProductAttributeValues::class, 'attribute_value_id');
    }




}
