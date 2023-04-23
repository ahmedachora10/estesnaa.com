<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventorProfile extends Model
{
    use HasFactory;

    protected $fillable = ['inventor_id', 'description', 'file','video', 'social_media'];

    protected $casts = [
        'social_media' => 'json'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'inventor_id')->inventor();
    }
}
