<?php

namespace App;

use App\Area;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $fillable = [
    	'table_name',
    	'area_id'
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
