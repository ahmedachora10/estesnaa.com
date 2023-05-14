<?php

namespace App\Models;

use App\Utils\CategoryType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['parent_id', 'name', 'description', 'image', 'sort'];

    protected $casts = [
        'parent_id' => CategoryType::class,
    ];

    public function events()
    {
        return $this->hasMany(Event::class)->active();
    }

    public function services()
    {
        return $this->hasMany(Service::class)->whereRelation('owner', 'service_provider_subscription_paid', true)->active()->orderBy('sort');
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

    public function getThumbAttribute()
    {
        $thumb = Storage::disk('public')->exists(str_replace('storage/', '', $this->image));
        return $thumb && !empty($this->image) ? $this->image : 'assets/default-category-1.png';
    }

}