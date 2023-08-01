<?php

namespace App\Models\attribute_value;
use App\Models\attribute\Attribute;
use App\Models\product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use function PHPSTORM_META\map;

class AttributeValue extends Model
{
    use HasFactory;

    protected $table = 'attribute_values';
    protected $primaryKey = 'id';
    protected $fillable = [
        'attribute_id',
        'code',
        'value'
    ];
    public  function attributes(): BelongsTo
    {
        return  $this->belongsTo(Attribute::class, 'attribute_id');
    }
}
