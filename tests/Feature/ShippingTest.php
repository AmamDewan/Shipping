<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShippingTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @test
     */
    public function a_user_can_create_a_shipment()
    {
        $this->withoutExceptionHandling();
        $attributes = [
            'number' => $this->faker->randomNumber(8),
            'email' => $this->faker->email
        ];
        $this->post('/shipping', $attributes)->assertRedirect('/shipping');

        $this->assertDatabaseHas('shippings', $attributes);

        $this->get('/shipping')->assertSee($attributes['number']);
    }
}
