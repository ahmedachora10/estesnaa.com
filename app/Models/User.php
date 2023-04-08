<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Casts\Status;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable implements MustVerifyEmail
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'avatar',
        'status',
        'password',
        'dob',
        'city',
        'country_id',
        'country_code',
        'role',
        'address',
        'service_provider_subscription_paid'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'status' => Status::class,
        'dob' => 'datetime',
        'email_verified_at' => 'datetime',
    ];

    public function scopeActive($query)
    {
        $query->where('status', Status::ENABLED->value);
    }

    public function serviceProviderSubscriptionPaid()
    {
        return $this->service_provider_subscription_paid == true;
    }

    public function plan()
    {
        return $this->hasOne(Subscription::class)->active();
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function inventions()
    {
        return $this->hasMany(Invention::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

}
