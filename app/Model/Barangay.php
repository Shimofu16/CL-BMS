<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    protected $guard = [];

    public function officials()
    {
        return $this->hasMany(Official::class);
    }
}
