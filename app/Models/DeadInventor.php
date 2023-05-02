<?php

namespace App\Models;

use App\Casts\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class DeadInventor extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'name', 'description', 'status'];

    protected $casts = [
        'status' => Status::class
    ];

    public function getThumbAttribute()
    {
        $imageExists = Storage::disk('public')->exists(str_replace('storage/', '', $this->image));
        return $imageExists ? $this->image : 'assets/avatar.jpg';
    }
}
