<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'partner_id',
        'amount',
        'discount_percentage',
        'active'        
    ];

    public function refferalCodes()
    {
        return $this->hasMany(RefferalCode::class);
    }

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }
}
