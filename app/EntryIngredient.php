<?php

namespace App;

use App\BranchOfficeIngredient;
use Illuminate\Database\Eloquent\Model;

class EntryIngredient extends Model
{
    protected $fillable = [
    	'quantity',
    	'balance',
    	'balance_decrease',
    	'branch_office_ingredient_id'
    ];

    public function branchOfficeIngredient()
    {
        return $this->belongsTo(BranchOfficeIngredient::class);
    }
}
