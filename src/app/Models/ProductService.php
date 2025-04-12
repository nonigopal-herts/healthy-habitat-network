<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductService extends Model
{
    public function subcategory(){
        return $this->belongsTo(ProductServiceSubcategory::class, 'product_service_subcategory_id');
    }

    public function priceTag(){
        return $this->belongsTo(PriceTag::class);
    }
}
