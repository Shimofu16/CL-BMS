<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $fillable = ['year'];

    public function officials()
    {
        return $this->hasMany(Official::class);
    }
}
