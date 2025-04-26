<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id',
        'product_service_id',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function productService()
    {
        //return $this->belongsTo(ProductService::class);
        return $this->belongsTo(ProductService::class)->with(['subcategory', 'priceTag']);
    }
}
