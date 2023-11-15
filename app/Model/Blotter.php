<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Resident;

class Blotter extends Model
{
  protected $table = 'blotters';
  protected $guarded = ['id']; 

  public function residents()
  {
    return $this->belongsToMany('App\Model\Resident');
  }

  protected $casts = [
    'person_to_complain_id' => 'array',
  ];

  public function getStatusAttribute()
  {
    return $this->settled_at == null ? 'Unsettled' : 'Settled';
  }
}