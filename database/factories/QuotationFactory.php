<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Quotation;
use Faker\Generator as Faker;

$factory->define(Quotation::class, function (Faker $faker) {
    return [
        'product_image' => $this->faker->image($dir = 'public/img', $width = 640, $height = 480, 'cats', false),
        'quantity' => $this->faker->randomNumber(2),
        'shipping_method' => $this->faker->randomElement($array = array ('air','ship')),
        'consolidate' => $this->faker->boolean
    ];
});
