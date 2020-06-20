<?php

namespace App;

use App\Menu;
use App\TableDiner;
use Illuminate\Database\Eloquent\Model;

class MenuTableDiner extends Model
{
    protected $fillable = [
    	'id',
		'menu_id',
		'table_diner_id',
		'quantity',
		'comments'
    ];

    public function tableDiner()
    {
        return $this->belongsTo(TableDiner::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function subtotal()
    {
        return $this->menu->price * $this->quantity;
    }
}
