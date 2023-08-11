<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Resident;
class Business extends Model
{
    protected $table = 'business';
    protected $guarded = ['id']; 

    public function residence()
    {
       return $this->belongsTo('App\Model\Resident','business_owner_id');
    }
}
