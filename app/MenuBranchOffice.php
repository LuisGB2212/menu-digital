<?php

namespace App;

use App\BranchOffice;
use App\Menu;
use Illuminate\Database\Eloquent\Model;

class MenuBranchOffice extends Model
{
    protected $fillable = [
    	'menu_id',
		'branch_office_id'
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function branchOffice()
    {
        return $this->belongsTo(BranchOffice::class);
    }
}
