<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Purok extends Model
{
    protected $fillable = [
        'name',
        'barangay_id',
    ];

    public function barangay()
    {
        return $this->belongsTo(Barangay::class, 'barangay_id');
    }
}
