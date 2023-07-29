<?php

namespace App\Models\brand;
use App\Models\product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use function PHPSTORM_META\map;

class Brand extends Model
{

    use HasFactory;

    protected $table = 'brands';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name'
    ];

    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }




}
