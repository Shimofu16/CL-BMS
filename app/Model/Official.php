<?php

namespace App\Model;

use App\Model\Year;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Official extends Model
{
    protected $table = 'officials';
    protected $guarded = [];

    protected $appends = [
        'full_name',
    ];
    public function getFullNameAttribute()
    {
        if ($this->middle_name) {
            return $this->first_name . ' ' . Str::ucfirst(Str::substr($this->middle_name, 0, 1)) . '. ' . $this->last_name;
        } else {
            return $this->first_name . ' ' . $this->last_name;
        }
    }

    public function barangay()
    {
        return $this->belongsTo(Barangay::class);
    }

    public function year()
    {
        return $this->belongsTo(Year::class);
    }
    public function user()
    {
        return $this->hasOne(User::class, 'official_id', 'id');
    }
}
