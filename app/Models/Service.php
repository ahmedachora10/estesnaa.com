<?php

namespace App\Models;

use App\Casts\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'category_id', 'name', 'price', 'image', 'description',
        'keywords', 'status', 'sort'
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

    public function rating()
    {
        return $this->hasMany(ServiceRating::class);
    }

    public function orders()
    {
        return $this->hasMany(ServiceOrder::class);
    }

}