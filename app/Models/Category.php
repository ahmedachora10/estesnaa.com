<?php

namespace App\Models;

use App\Utils\CategoryType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['parent_id', 'name', 'description', 'image'];

    protected $casts = [
        'parent_id' => CategoryType::class,
    ];

    public function events()
    {
        return $this->hasMany(Event::class)->active();
    }

    public function services()
    {
        return $this->hasMany(Service::class)->active();
    }

    public function scopeServicesSection($query)
    {
        $query->where('parent_id', CategoryType::SERVICES->value);
    }

    public function scopeEventsSection($query)
    {
        $query->where('parent_id', CategoryType::EVENTS->value);
    }

    public function scopeInventionsSection($query)
    {
        $query->where('parent_id', CategoryType::INVENTIONS->value);
    }

}