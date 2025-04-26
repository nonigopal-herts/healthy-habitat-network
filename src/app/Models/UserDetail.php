<?php

// app/Models/UserDetail.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    // Add this to your UserDetail model
    protected $casts = [
        'interests' => 'array', // Automatically cast to/from JSON
    ];

    protected $fillable = [
        'user_id',
        'contact_info',
        'age',
        'gender',
        'interests',
        'logo',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
