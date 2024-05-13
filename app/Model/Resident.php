<?php

namespace App\Model;

use Carbon\Carbon;
use App\Model\Purok;
use App\Model\Blotter;
use App\Model\Barangay;
use App\Model\Business;
use App\Model\FamilyMember;
use App\Overlap;
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
        'address',
    ];

    public function getFullNameAttribute()
    {
        if ($this->middle_name) {
            return $this->first_name . ' ' . Str::ucfirst(Str::substr($this->middle_name, 0, 1)) . '. ' . $this->last_name;
        } else {
            return $this->first_name.' '.$this->last_name;
        }
    }

    public function getAddressAttribute()
    {
        return $this->house_number . ' ' . $this->purok?->name .  ' ' . $this->street . ', ' . $this->barangay->name . ', ' . 'Calauan, Laguna';
    }

    public function hasUnsettledBlotter()
    {
        return $this->blotters()->where('status', '!=', 'settled')->count() > 0;
    }

    public function getUnsettledBlotter()
    {
        return $this->blotters()->where('status', '!=', 'settled')->get();
    }

    public function members()
    {
        return $this->hasMany(FamilyMember::class, 'head_id', 'id');
    }

    public function barangay()
    {
        return $this->belongsTo(Barangay::class, 'barangay_id');
    }

    public function purok()
    {
        return $this->belongsTo(Purok::class, 'purok_id');
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
