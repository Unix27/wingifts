<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotification;

class UserHistory extends Model
{
	// use CrudTrait;
 //    use HasRoles;
 //    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    // History statuses:
    //  - subscribed   (Подписался)
    //  - unsubscribed (Отписался)
    //  - renewed      (Продлил подписку)
    //  - unrenewed    (Не продлил подписку)
    
    protected $table = 'user_history';

    protected $fillable = [
        'user_id',
        'action',
    ];

    public function history(){
        return $this->belongsTo(User::class);
    }


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime'
    // ];

    // public function sendPasswordResetNotification($token)
    // {
    //     $url = url("/reset-password/$token?email=" . $this->email);

    //     $this->notify(new ResetPasswordNotification($url));
    // }


    
    // public function cloudSubscriptions() {
    //     return $this->hasMany(CloudPaymentsSubscription::class);
    // }

    // public function getFullnameAttribute()
    // {
    //     return $this->name . ' ' . $this->lastname;
    // }

    // public function getIsSubscribedAttribute()
    // {
    //     return $this->cloudSubscriptions()->active()->first();
    //     //return $this->cloudSubscriptions()->count() && $this->cloudSubscriptions()->max('nextTransactionDate') >= now();
    // }

    // public function getActiveSubscriptionAttribute()
    // {
    //     return $this->cloudSubscriptions()->activeSubscription()->first();
    // }

    // public function getFailedSubscriptionAttribute()
    // {
    //     return $this->cloudSubscriptions()->failedSubscription()->first();
    // }
}
