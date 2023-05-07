<?php

namespace App\Models;

use App\Casts\Stage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceStage extends Model
{
    use HasFactory;

    protected $fillable = ['buyer_id', 'service_id', 'stage'];

    protected $casts = [
        'stage' => Stage::class
    ];

    public function scopeImplemented($query)
    {
        $query->where('stage', Stage::IMPLEMENT->value);
    }

    public function scopeReceipted($query)
    {
        $query->where('stage', Stage::RECEIPT->value);
    }

    public function scopeCanceled($query)
    {
        $query->where('stage', Stage::CANCEL->value);
    }

    public function getIsImplementedAttribute()
    {
        return $this->stage == Stage::IMPLEMENT;
    }

    public function getIsReceiptedAttribute()
    {
        return $this->stage == Stage::RECEIPT;
    }

    public function getIsCanceledAttribute()
    {
        return $this->stage == Stage::CANCEL;
    }

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}