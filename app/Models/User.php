<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'lastname',
        'phone',
        'card_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    public function cloudSubscriptions() {
        return $this->hasMany(CloudPaymentsSubscription::class);
    }

    public function getFullnameAttribute()
    {
        return $this->name . ' ' . $this->lastname;
    }

    public function getIsSubscribedAttribute()
    {
        return $this->cloudSubscriptions()->active()->first();
        //return $this->cloudSubscriptions()->count() && $this->cloudSubscriptions()->max('nextTransactionDate') >= now();
    }

    public function getActiveSubscriptionAttribute()
    {
        return $this->cloudSubscriptions()->activeSubscription()->first();
    }

    public function getFailedSubscriptionAttribute()
    {
        return $this->cloudSubscriptions()->failedSubscription()->first();
    }
}
