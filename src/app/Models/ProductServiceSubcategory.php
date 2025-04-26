<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductServiceSubcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'product_service_category_id',
    ];

    //protected $table = 'product_service_subcategories'; // Explicit table name
    public function category()
    {
        return $this->belongsTo(ProductServiceCategory::class, 'product_service_category_id');
    }
}
