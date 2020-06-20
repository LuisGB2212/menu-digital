<?php

namespace App;

use App\Category;
use App\MenuBranchOffice;
use App\MenuTableDiner;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
    	'id',
		'name',
		'price',
		'description',
		'type_id',
		'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function menuBranchOffices()
    {
        return $this->hasMany(MenuBranchOffice::class);
    }

    public function menuTableDiner()
    {
        return $this->hasOne(MenuTableDiner::class);
    }
}
