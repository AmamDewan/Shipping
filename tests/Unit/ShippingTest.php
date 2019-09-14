<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShippingTest extends TestCase
{
	use RefreshDatabase;
	/** @test */
	public function it_has_a_path()
    {
    	$shipment = factory('App\Shipping')->create();

    	$this->assertEquals('/shipping/'. $shipment->id, $shipment->path());
    }

    /** @test */
    public function it_belongs_to_an_owner()
    {
        $shipment = factory('App\Shipping')->create();
        $this->assertInstanceOf('App\User', $shipment->owner);
    }
}
