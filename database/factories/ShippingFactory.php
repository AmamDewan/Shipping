<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Shipping;
use Faker\Generator as Faker;

$factory->define(Shipping::class, function (Faker $faker) {
    return [
        'name' => $this->faker->name($gender = 'male'),
        'conversion_rate' => $this->faker->randomNumber(2),
        'number' => $this->faker->randomNumber(8),
        'email' => $this->faker->email,
        'owner_id' => function() {
            return factory(App\User::class)->create()->id;
        },
    ];
});
