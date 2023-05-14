<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Casts\Status;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

use function Clue\StreamFilter\fun;

class User extends Authenticatable implements MustVerifyEmail
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;

    private $column;

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

    public function scopeServiceProvider($query)
    {
        $query->where('role', 'service_provider');
    }
    public function scopeInventor($query)
    {
        $query->where('role', 'inventor');
    }

    public function serviceProviderSubscriptionPaid()
    {
        return $this->service_provider_subscription_paid == true;
    }

    public function inventorProfile()
    {
        return $this->hasOne(InventorProfile::class, 'inventor_id');
    }

    public function plan()
    {
        return $this->hasOne(Subscription::class)->active();
    }

    public function inventorProfilePlan()
    {
        return $this->hasOne(Subscription::class)->whereHas('package', function ($query)
        {
            $query->where('group', 'inventor_profile');
        })->active();
    }

    public function expiredPlan()
    {
        return $this->hasOne(Subscription::class)->where('end_date', '<', date('Y-m-d'));
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

    public function profit()
    {
        return $this->hasOne(UserProfit::class);
    }

    public function pendingBalance()
    {
        return $this->hasMany(PendingBalance::class);
    }

    public function orders()
    {
        return $this->hasMany(ServiceOrder::class, 'buyer_id');
    }

    public function purchases()
    {
        return $this->hasMany(ServiceStage::class, 'buyer_id');
    }

    public function getPendingBalanceAttribute()
    {
        return $this->pendingBalance()->sum('amount');
    }

    public function serviceProviderChat()
    {
        return $this->hasMany(Chat::class, 'service_provider_id');
    }

    public function userChat()
    {
        return $this->hasMany(Chat::class, 'user_id');
    }

    public function chat()
    {
        if(in_array($this->role, ['service_provider', 'inventor'])) {
            return $this->serviceProviderChat();
        }else {
            return $this->userChat();
        }
    }

    public function messages()
    {
        $column =  in_array($this->role, ['service_provider', 'inventor']) ? 'service_provider_id' : 'user_id';
        return $this->hasManyThrough(Message::class, Chat::class, $column, 'chat_id', 'id', 'id')->where('messages.user_id', '!=', auth()->id());
    }

    public function getMessagesCountAttribute()
    {
        return $this->messages()->whereNull('seen')->count();
    }

    public function getImageAttribute()
    {
        $avatarExists = Storage::disk('public')->exists(str_replace('storage/', '', $this->avatar));
        return $avatarExists ? $this->avatar : 'assets/avatar.jpg';
    }
}