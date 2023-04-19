<?php

namespace App\Models;

use App\Casts\UserWithdrawalRequestType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWithdrawalRequest extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'email', 'amount', 'status'];

    protected $casts = [
        'status' => UserWithdrawalRequestType::class
    ];

    public function scopePending($query)
    {
        $query->where('status', UserWithdrawalRequestType::PENDING->value);
    }

    public function scopeCompleted($query)
    {
        $query->where('status', UserWithdrawalRequestType::COMPLETED->value);
    }

    public function scopeCanceled($query)
    {
        $query->where('status', UserWithdrawalRequestType::CANCELED->value);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}