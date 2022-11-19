<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesLine extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['sale_id', 'product_id', 'quantity', 'current_price', 'current_buy_price'];

    protected $appends = ['sub_total', 'price'];

    public function getPriceAttribute()
    {
        return number_format($this->attributes['current_price'], 2, ',', '.');
    }

    public function getSubTotalAttribute()
    {
        return number_format($this->quantity * $this->current_price, 2, ',', '.');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function sale()
    {
        return $this->belongsTo(Sale::class, 'sale_id', 'id');
    }
}
