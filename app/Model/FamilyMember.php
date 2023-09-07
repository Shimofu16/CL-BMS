<?php

namespace App\Model;

use App\Model\Resident;
use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{
    protected $fillable = ['head_id', 'resident_number', 'name', 'birthdate', 'relationship'];

    protected $casts = [
        'birthdate' => 'date'
    ];

    public function head()
    {
        return $this->belongsTo(Resident::class, 'id', 'head_id');
    }
}
