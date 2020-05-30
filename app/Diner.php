<?php

namespace App;

use App\TableDiner;
use Illuminate\Database\Eloquent\Model;

class Diner extends Model
{
    protected $fillable = [
    	'id',
		'diner_name',
		'diner_nickname'
    ];

    public function tableDiner()
    {
        return $this->hasOne(TableDiner::class);
    }
}
