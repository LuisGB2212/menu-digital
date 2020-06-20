<?php

namespace App;

use App\Area;
use App\Check;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $fillable = [
    	'table_name',
    	'table_status',
    	'table_number_packs',
    	'area_id'
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function checks()
    {
        return $this->hasMany(Check::class);
    }

}
