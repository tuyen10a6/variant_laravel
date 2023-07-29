<?php

namespace App\Models\product;

use App\Models\brand\Brand;
use App\Models\category\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Relations\HasMany;
use function PHPSTORM_META\map;

class Product extends Model
{

   use HasFactory;
    const PRODUCT_STATUS_IS_ACTIVE = 1;

    protected $table = 'products';
    protected $primaryKey = 'id';

    protected $fillable = [
        'sku',
        'category_id',
        'name',
        'short_description',
        'slug',
        'price',
        'promotion_price',
        'product_promotion_id',
        'qty',
        'status',
        'brand_id',
        'video_url',
        'algolia_sync_status',
        'sync_seo_content'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public  function brand(): BelongsTo
    {
        return  $this->belongsTo(Brand::class, 'brand_id');
    }






}
