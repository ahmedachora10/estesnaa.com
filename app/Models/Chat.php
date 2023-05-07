<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'service_provider_id', 'service_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function serviceProvider()
    {
        return $this->belongsTo(User::class, 'service_provider_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }


}