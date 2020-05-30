<?php

namespace App;

use App\Diner;
use App\MenuTableDiner;
use App\Table;
use Illuminate\Database\Eloquent\Model;

class TableDiner extends Model
{
    protected $fillable = [
    	'id',
		'table_id',
		'diner_id'
    ];

    public function diner()
    {
        return $this->belongsTo(Diner::class);
    }

    public function menuTableDiners()
    {
        return $this->hasMany(MenuTableDiner::class);
    }

    public function table()
    {
        return $this->belongsTo(Table::class);
    }
}
