<?php

namespace App;

use App\Category;
use App\FoodType;
use App\RestaurantUser;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
    	'id',
    	'restaurant_name',
    	'rfc'
    ];

    public function branchOffices()
    {
        return $this->hasMany(BranchOffice::class);
    }

    public function restaurantUsers()
    {
        return $this->hasMany(RestaurantUser::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
