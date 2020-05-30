<?php

namespace App;

use App\BranchOffice;
use App\EntryIngredient;
use App\Ingredient;
use Illuminate\Database\Eloquent\Model;

class BranchOfficeIngredient extends Model
{
    protected $fillable = [
    	'ingredient_id',
    	'branch_office_id',
        'min_balance'
    ];

    public function branchOffice()
    {
        return $this->belongsTo(BranchOffice::class);
    }

    public function entryIngredients()
    {
        return $this->hasMany(EntryIngredient::class);
    }

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class);
    }
}
