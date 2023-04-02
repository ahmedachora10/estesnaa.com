<?php

namespace App\Models;

use App\Casts\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedService extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'icon', 'description', 'status'];

    protected $casts = [
        'status' => Status::class
    ];

    public function scopeActive($query)
    {
        $query->where('status', Status::ENABLED->value);
    }

    public function scopeDisctive($query)
    {
        $query->where('status', Status::DISABLED->value);
    }
}