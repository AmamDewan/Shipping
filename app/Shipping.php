<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $guarded = [];

    public function path()
    {
    	return "/shipping/{$this->id}";
    }
}
