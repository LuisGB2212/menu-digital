<?php

namespace App;

use App\BranchOffice;
use App\Table;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
    	'area_name',
    	'branch_office_id'
    ];

    public function branchOffice()
    {
        return $this->belongsTo(BranchOffice::class);
    }

    public function tables()
    {
        return $this->hasMany(Table::class);
    }
}
