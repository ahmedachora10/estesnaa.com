<?php

namespace App\Models;

use App\Casts\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'status'];

    protected $casts = [
        'status' => Status::class
    ];

    public function scopeActive($query)
    {
        $query->where('status', Status::ENABLED->value);
    }
}