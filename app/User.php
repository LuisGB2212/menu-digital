<?php

namespace App;

use App\BranchOffice;
use App\RestaurantUser;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_restaurant_name', 'email', 'password','restaurant_id','nick_name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function restaurantUsers()
    {
        return $this->hasMany(RestaurantUser::class);
    }

    public function branchOffice()
    {
        return $this->belongsTo(BranchOffice::class);
    }

}
