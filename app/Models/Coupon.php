<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = [
        'coupon_code',
        'discount_value',
        'expiration_date',
    ];

    public function couponsUser()
    {
        return $this->hasMany(UserCoupon::class);
    }
}
