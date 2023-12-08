<?php

namespace App\Model;

use App\Model\Resident;
use Illuminate\Database\Eloquent\Model;

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
    if ($this->settled_at || $this->cancelled_at) {
      if ($this->settled_at) return 'Settled';
      if ($this->cancelled_at) return 'Cancelled';
    } else {
      return 'Unsettled';
    }
  }

  public function activity()
  {
    return $this->morphOne(ActivityLog::class, 'subject');
  }
}