<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $guarded = [];

    public function path()
    {
    	return "/shipment/{$this->id}";
    }
    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
