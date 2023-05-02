<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventorProfile extends Model
{
    use HasFactory;

    protected $fillable = ['inventor_id', 'description', 'file', 'confirmed','video', 'facebook', 'twitter', 'instagram', 'whatsapp'];

    public function scopeHasCertificate($query)
    {
        $query->where('confirmed', true);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'inventor_id')->inventor();
    }
}
