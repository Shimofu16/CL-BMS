<?php

namespace App;

use App\Casts\Json;
use App\Model\Resident;
use Illuminate\Database\Eloquent\Model;

class Permit extends Model
{
    protected $casts = [
        'details' => Json::class,
        'created_at' => 'datetime'
    ];

    protected $fillable = ['type', 'resident_id', 'barangay_id', 'details'];

    public function owner()
    {
        return $this->belongsTo(Resident::class, 'resident_id');
    }
}
