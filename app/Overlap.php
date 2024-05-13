<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Overlap extends Model
{
    protected $fillable = ['existing_id', 'new_id'];
}
