<?php

namespace App\Models;

use App\Casts\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'image', 'status'];

    public function scopeActive($query)
    {
        $query->where('status', Status::ENABLED->value);
    }

    public function scopeDisactive($query)
    {
        $query->where('status', Status::DISABLED->value);
    }

    protected $casts = [
        'status' => Status::class
    ];

}