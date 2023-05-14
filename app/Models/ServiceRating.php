<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRating extends Model
{
    use HasFactory;

    protected $fillable = ['service_stage_id', 'service_id', 'user_id', 'rating', 'comment'];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function serviceStage()
    {
        return $this->belongsTo(ServiceStage::class, 'service_stage_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}