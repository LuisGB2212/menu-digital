<?php

namespace App;

use App\Ingredient;
use Illuminate\Database\Eloquent\Model;

class IngredientUnit extends Model
{
    protected $fillable = [
    	'id',
    	'ingredient_unit_name'
    ];

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }

}
