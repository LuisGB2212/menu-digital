<?php

namespace App;

use App\TableDiner;
use Illuminate\Database\Eloquent\Model;

class MenuTableDiner extends Model
{
    protected $fillable = [
    	'id',
		'menu_id',
		'table_diner_id'
    ];

    public function tableDiner()
    {
        return $this->belongsTo(TableDiner::class);
    }
}
