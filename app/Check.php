<?php

namespace App;

use App\Table;
use App\TableDiner;
use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    protected $fillable = [
    	'invoice',
    	'table_id'
    ];

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function tableDiners()
    {
        return $this->hasMany(TableDiner::class);
    }

}
