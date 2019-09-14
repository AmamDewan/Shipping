<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShippingTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function gests_cannot_create_shipment()
    {
        $attributes = factory('App\Shipping')->raw();
        $this->post('/shipping', $attributes)->assertRedirect('login');
    }

    /** @test */
    public function gests_cannot_view_shipment()
    {
        $this->post('/shipping')->assertRedirect('login');
    }

    /** @test */
    public function gests_cannot_view_a_single_shipment()
    {
        $shipment = factory('App\Shipping')->create();

        $this->get($shipment->path())->assertRedirect('login');
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
        $this->be(factory('App\User')->create());
        $this->withoutExceptionHandling();

        $shipment = factory('App\Shipping')->create(['owner_id'=> auth()->id()]);

        $this->get($shipment->path())
            ->assertSee($shipment->name)
            ->assertSee($shipment->email);
    }

    /** @test */
    public function an_authenticated_user_cannot_view_the_shipment_of_other()
    {
        $this->be(factory('App\User')->create());
        // $this->withoutExceptionHandling();

        $shipment = factory('App\Shipping')->create();

        $this->get($shipment->path())->assertStatus(403);
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
