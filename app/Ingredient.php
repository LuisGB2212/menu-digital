<?php

namespace App;

use App\BranchOfficeIngredient;
use App\Restaurant;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = [
    	'ingredient_name',
    	'ingredient_unit',
    	'restaurant_id'
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function branchOfficeIngredients()
    {
        return $this->hasMany(BranchOfficeIngredient::class);
    }
}
