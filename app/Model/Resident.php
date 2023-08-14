<?php

namespace App\Model;

use Carbon\Carbon;
use App\Model\Blotter;
use App\Model\Business;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    protected $table = 'residents';
    protected $guarded = ['id'];
    protected $casts = [
        'birthday' => 'datetime'
    ];

    public function getFullName()
    {
        return $this->first_name . ' ' . Str::ucfirst(Str::substr($this->middle_name, 0, 1)) . '. ' . $this->last_name;
    }
    public function getAge()
    {
        return Carbon::parse($this->birthday)->age;
    }
    public function getAddress()
    {
        return $this->house_number . ' ' . $this->purok .  ' ' . $this->street . ', ' . $this->barangay->name . ' ' . 'Calauan, Laguna';
    }
    public function barangay()
    {
        return $this->belongsTo(Barangay::class);
    }

    public function business()
    {
        return $this->hasMany('App\Model\Business', 'business_owner_id');
    }

    public function blotters()
    {
        return $this->belongsToMany('App\Model\Blotter');
    }
}
