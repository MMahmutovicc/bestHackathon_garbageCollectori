<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefferalCode extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'code',
        'offer_id',
        'user_id',
        'active'        
    ];

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
