<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductServiceVote extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_service_id',
        'business_id',
        'user_id',
        'yes_vote',
        'no_vote'
    ];

    public function productService()
    {
        return $this->belongsTo(ProductService::class);
    }

    public function business()
    {
        return $this->belongsTo(User::class, 'business_id')->whereHas('roles', function($q) {
            $q->where('id', 3); // Role ID 3 for business
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class)->whereHas('roles', function($q) {
            $q->where('id', 4); // Role ID 4 for regular user
        });
    }
}
