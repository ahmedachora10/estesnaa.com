<?php

namespace App\Models;

use App\Casts\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'image',
        'title',
        'description',
        'address',
        'date',
        'time',
        'keywords',
        'status',
        'views',
    ];

    protected $casts = [
        'status' => Status::class,
        'date' => 'datetime'
    ];

    public function scopeActive($query)
    {
        $query->where('status', Status::ENABLED->value);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
