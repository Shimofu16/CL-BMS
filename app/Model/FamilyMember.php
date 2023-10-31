<?php

namespace App\Model;

use App\Model\Resident;
use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{
    protected $fillable = ['head_id', 'resident_number', 'name', 'birthdate', 'relationship'];

    protected $appends = [
        'full_name',
        'address',
    ];
    protected $casts = [
        'birthdate' => 'date'
    ];

    public function getFullNameAttribute()
    {
        return "{$this->name}";
    }

    public function getAddressAttribute()
    {
        return "{$this->head->address}";
    }

    public function head()
    {
        return $this->belongsTo(Resident::class, 'id', 'head_id');
    }
}
