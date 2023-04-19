<?php

namespace App\Models;

use App\Casts\Status;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'plan_id', 'amount', 'start_date', 'end_date', 'status'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'status' => Status::class
    ];

    public function scopeActive($query)
    {
        $query->where('status', Status::ENABLED->value);
    }

    public function scopeDisactive($query)
    {
        $query->where('status', Status::DISABLED->value);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function package()
    {
        return $this->belongsTo(Package::class, 'plan_id');
    }

    public function getExpiredAttribute()
    {
        return Carbon::parse($this->end_date)->isPast();
    }

    public function getDurationTimeAttribute()
    {
        return Carbon::parse($this->end_date);
    }

}