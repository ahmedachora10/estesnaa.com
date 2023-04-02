<?php

namespace App\Models;

use App\Casts\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'price', 'duration', 'discount', 'features', 'status', 'group' // role
    ];

    protected $casts = [
        'status' => Status::class,
        'features' => 'json'
    ];

    public function getAmountAttribute()
    {
        return $this->discount == 0 ? $this->price : $this->price - (($this->price * $this->discount) / 100);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

}