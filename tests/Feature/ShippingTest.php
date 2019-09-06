<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShippingTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function only_authenticated_users_can_create_projects()
    {
        $attributes = factory('App\Shipping')->raw();
        $this->post('/shipping', $attributes)->assertRedirect('login');
    }

    /** @test */
    public function a_user_can_create_a_shipment()
    {
        $this->withoutExceptionHandling();
        $this->actingAs(factory('App\User')->create());

        $attributes = [
            'name' => $this->faker->name($gender = 'male'),
            'conversion_rate' => $this->faker->randomNumber(2),
            'number' => $this->faker->randomNumber(8),
            'email' => $this->faker->email
        ];
        $this->post('/shipping', $attributes)->assertRedirect('/shipping');

        $this->assertDatabaseHas('shippings', $attributes);

        $this->get('/shipping')->assertSee($attributes['name']);
    }

    /** @test */
    public function a_user_can_view_a_shipment()
    {
        $this->withoutExceptionHandling();

        $shipment = factory('App\Shipping')->create();

        $this->get($shipment->path())
            ->assertSee($shipment->name)
            ->assertSee($shipment->email);
    }

    /** @test */
    public function a_shipping_requires_a_number()
    {
        $this->actingAs(factory('App\User')->create());

        $attributes = factory('App\Shipping')->raw(['number'=>'']);
        $this->post('/shipping', $attributes)->assertSessionHasErrors('number');
    }

    /** @test */
    public function a_shipping_requires_a_email()
    {
        $this->actingAs(factory('App\User')->create());
        $attributes = factory('App\Shipping')->raw(['email'=>'']);
        $this->post('/shipping', $attributes)->assertSessionHasErrors('email');
    }
}
