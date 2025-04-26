<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductServiceCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'product_service_type_id',
    ];

    public function subcategories()
    {
        return $this->hasMany(ProductServiceSubcategory::class, 'product_service_category_id');
    }
}
