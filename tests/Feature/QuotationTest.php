<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuotationTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    /** @test */
    public function a_user_can_create_a_quote()
    {
        $this->withoutExceptionHandling();
        // $this->actingAs(factory('App\User')->create());

        $attributes = [
            'product_image' => $this->faker->image($dir = 'public/img', $width = 640, $height = 480, 'cats', false),
            'quantity' => $this->faker->randomNumber(2),
            'shipping_method' => $this->faker->randomElement($array = array ('air','ship')),
            'consolidate' => $this->faker->boolean
        ];
        $this->post('/quotation', $attributes);

        $this->assertDatabaseHas('quotations', $attributes);

         $this->get('/quotation')->assertSee($attributes['quantity']);
    }
}
