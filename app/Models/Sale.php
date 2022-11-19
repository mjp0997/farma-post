<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'client_id'];

    protected $appends = ['total'];

    public function getTotalAttribute()
    {
        $total = 0;

        foreach ($this->saleslines as $salesline) {
            $total += $salesline->quantity * $salesline->current_price;
        }

        return number_format($total, 2, ',', '.');
    }

    public function saleslines()
    {
        return $this->hasMany(SalesLine::class, 'sale_id', 'id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
