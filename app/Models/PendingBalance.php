<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PendingBalance extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'amount'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSuspensionExpired($query)
    {
        $query->where('created_at', '<' ,now()->subDays(setting('pending_balance_duration'))->format('Y-m-d'));
    }

    // public function getSuspensionExpiredAttribute()
    // {
    //     return Carbon::parse($this->created_at)->isPast();
    // }
}