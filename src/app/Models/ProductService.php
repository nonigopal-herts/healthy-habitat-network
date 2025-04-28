<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductService extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        //'product_service_types_id',
        //'product_service_category_id',
        'product_service_subcategory_id',
        'price_tag_id',
        'size',
        'quantity',
        'health_benefits',
        'image',
        'certificates',
        'price'
    ];

    protected $casts = [
        'certificates' => 'array',
        'price' => 'decimal:2'
    ];

    public function category()
    {
        return $this->belongsTo(
            ProductServiceCategory::class,
            'product_service_category_id',
            'id'
        );
    }

    /**
     * Get the subcategory of the product/service
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subcategory()
    {
        return $this->belongsTo(
            ProductServiceSubcategory::class,
            'product_service_subcategory_id',
            'id'
        );
    }

    public function priceTag()
    {
        return $this->belongsTo(PriceTag::class);
    }

    public function getImageUrl()
    {
        if ($this->image) {
            return asset($this->image);
        }

        // Choose one of these options:
        return 'https://source.unsplash.com/random/300x200/?product';
        // or
        //return 'https://placehold.co/300x200/EEE/31343C?font=roboto&text=No+Image';
    }
}
