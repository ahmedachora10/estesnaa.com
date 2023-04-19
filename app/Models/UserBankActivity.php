<?php

namespace App\Models;

use App\Casts\UserActivityType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBankActivity extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'activity_type', 'amount'];

    protected $casts = [
        'activity_type' => UserActivityType::class
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}