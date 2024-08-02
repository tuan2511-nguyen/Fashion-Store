<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'billing_name',
        'billing_address',
        'apartment',
        'billing_number_phone',
        'province',
        'district',
        'ward',
        'order_notes',
        'total_amount',
        'payment_method',
        'status',
        'order_date'
    ];

    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }
    public function customer(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
