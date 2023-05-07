<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlatformPendingBalance extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'amount', 'is_service_provider_received_money'];

    public function scopeServiceProviderReceivedMoney($query)
    {
        $query->where('is_service_provider_received_money', true);
    }

    public function scopePendingBalance($query)
    {
        $query->where('is_service_provider_received_money', false);
    }

    public function scopeCurrentUser($query)
    {
        $query->where('user_id', auth()->id());
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}