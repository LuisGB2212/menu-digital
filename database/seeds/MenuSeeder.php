<?php

use App\Menu;
use App\MenuBranchOffice;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Menu::class, 'alimento',100)->create()->each(function ($menu) {
	        factory(MenuBranchOffice::class)->create([
                'menu_id' => $menu->id,
            ]);
	    });


        factory(Menu::class, 'drinks',100)->create()->each(function ($menu) {
	        factory(MenuBranchOffice::class)->create([
                'menu_id' => $menu->id,
            ]);
	    });

    }
}
