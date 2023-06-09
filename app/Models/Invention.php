<?php

namespace App\Models;

use App\Casts\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invention extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'category_id', 'name', 'image', 'description',
        'price', 'discount', 'keywords', 'status', 'views'
    ];

    protected $casts = [
        'status' => Status::class
    ];

    public function scopeActive($query)
    {
        $query->where('status', Status::ENABLED->value);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getOriginalPriceAttribute()
    {
        return $this->price - (($this->price * $this->discount) / 100);
    }
}