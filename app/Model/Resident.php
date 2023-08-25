<?php

namespace App\Model;

use Carbon\Carbon;
use App\Model\Purok;
use App\Model\Blotter;
use App\Model\Barangay;
use App\Model\Business;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    protected $table = 'residents';
    protected $guarded = ['id'];
    protected $casts = [
        'birthday' => 'date'
    ];

    protected $appends = [
        'full_name',
        'address',
    ];

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . Str::ucfirst(Str::substr($this->middle_name, 0, 1)) . '. ' . $this->last_name;
    }

    public function getAddressAttribute()
    {
        return $this->house_number . ' ' . $this->purok->name .  ' ' . $this->street . ', ' . $this->barangay->name . ', ' . 'Calauan, Laguna';
    }
    public function hasUnsettledBlotter()
    {
        return $this->blotters()->where('status', '!=', 'settled')->count() > 0;
    }
    public function getUnsettledBlotter()
    {
        return $this->blotters()->where('status', '!=', 'settled')->get();
    }

    public function barangay()
    {
        return $this->belongsTo(Barangay::class);
    }

    public function purok()
    {
        return $this->belongsTo(Purok::class);
    }

    public function business()
    {
        return $this->hasMany(Business::class, 'business_owner_id');
    }

    public function blotters()
    {
        return $this->belongsToMany(Blotter::class);
    }
}
