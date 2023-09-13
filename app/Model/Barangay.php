<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    protected $guarded = [];

    public function officials()
    {
        return $this->hasMany(Official::class);
    }

    public function puroks()
    {
        return $this->hasMany(Purok::class, 'barangay_id');
    }

    public function residents()
    {
        return $this->hasMany(Resident::class, 'barangay_id');
    }
}
