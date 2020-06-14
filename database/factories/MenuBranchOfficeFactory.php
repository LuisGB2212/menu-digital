<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\MenuBranchOffice;
use Faker\Generator as Faker;

$factory->define(MenuBranchOffice::class, function (Faker $faker) {
    return [
		'menu_id' => 1,
		'branch_office_id' => 1,
    ];
});
