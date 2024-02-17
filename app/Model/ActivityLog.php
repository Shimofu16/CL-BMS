<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $fillable = ['user_id', 'action', 'description', 'scope', 'subject_type', 'subject_id', 'subject'];

    public function subject()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['type'] ?? null, function ($query, $type) {
            $query->where('scope',$type);
        })->when($filters['barangay'] ?? null, function ($query, $barangay) {
            $query->whereHas('user', function ($query) use ($barangay) {
                $query->whereHas('official', function ($query) use ($barangay) {
                    $query->where('barangay_id',$barangay);
                });
            });
        });
    }
}
