<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesLine extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['sale_id', 'product_id', 'quantity', 'current_price', 'current_buy_price'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
