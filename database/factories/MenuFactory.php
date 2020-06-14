<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Menu;
use App\Category;
use Faker\Generator as Faker;
use FakerRestaurant\Restaurant;

$factory->defineAs(Menu::class, 'alimento', function (Faker $faker) {
    $faker2 = \Faker\Factory::create();
    $faker2->addProvider(new \FakerRestaurant\Provider\es_PE\Restaurant($faker2));
    return [
		'name' => $faker2->foodName(),
		'price' => $faker->numberBetween($min = 10, $max = 100),
		'description' => $faker->sentence,
		'type_id' => 1,
		'category_id' =>  Category::inRandomOrder()->value('id') ?: 1,
    ];
});

$factory->defineAs(Menu::class, 'drinks', function (Faker $faker) {
    $faker2 = \Faker\Factory::create();
    $faker2->addProvider(new \FakerRestaurant\Provider\es_PE\Restaurant($faker2));
    return [
		'name' => $faker2->beverageName(),
		'price' => $faker->numberBetween($min = 10, $max = 100),
		'description' => $faker->sentence,
		'type_id' => 2,
		'category_id' =>  Category::inRandomOrder()->value('id') ?: 1,
    ];
});
