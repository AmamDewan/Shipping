<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /** @test */
    public function has_shipping()
    {
     	$user = factory('App\User')->create();

    	$this->assertInstanceOf(Collection::class, $user->shipping);
    }

}
