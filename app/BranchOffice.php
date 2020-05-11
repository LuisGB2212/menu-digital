<?php

namespace App;

use App\Area;
use App\BranchOfficeIngredient;
use App\MenuBranchOffice;
use App\User;
use App\UserBranchOffice;
use Illuminate\Database\Eloquent\Model;

class BranchOffice extends Model
{
    protected $fillable = [
    	'id',
    	'branch_office_name',
    	'restaurant_id'
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function menuBranchOffices()
    {
        return $this->hasMany(MenuBranchOffice::class);
    }

    public function areas()
    {
        return $this->hasMany(Area::class);
    }

    public function branchOfficeIngredients()
    {
        return $this->hasMany(BranchOfficeIngredient::class);
    }

}
