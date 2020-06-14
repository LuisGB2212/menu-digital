<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncarTablas([
            // 'restaurants',
            // 'branch_offices',
            // 'users',
            'menu_branch_offices',
            'menus',
            //'types'
            
        ]);
        // $this->call(UsersTableSeeder::class);
        // $this->call(RestaurantSeeder::class);
        // $this->call(BranchOfficeSeeder::class);
        // $this->call(UserSeeder::class);
        $this->call(MenuSeeder::class);
    }

    protected function truncarTablas(array $tables){
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        
        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
