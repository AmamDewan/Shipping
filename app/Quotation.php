<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    protected $guarded = [];

    protected function owner()
    {
        return $this->belongsTo(User::class);
    }
}
