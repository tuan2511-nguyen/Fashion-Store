<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'variant_id',
        'quantity',
        'price',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Nếu cần liên kết với model Variant (giả sử bạn có model này)
    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'variant_id');
    }
}
