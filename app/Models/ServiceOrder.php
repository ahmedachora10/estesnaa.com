<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    use HasFactory;

    protected $fillable = ['buyer_id', 'service_provider_id', 'category_id', 'amount'];

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function serviceProvider()
    {
        return $this->belongsTo(User::class, 'service_provider_id')->serviceProvider();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
