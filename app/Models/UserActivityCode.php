<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActivityCode extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'activity_id', 'code'];

    public function activity() {
        return $this->belongsTo('App\Models\Activity');
    }

    public function getAcceptedAttribute() {
        $activityCode = ActivityCode::where('activity_id', $this->activity_id)
            ->where('code', $this->code)->first();

        return $activityCode && $activityCode->starts->isBefore($this->created_at->addMinute()) && $activityCode->expires->isAfter($this->created_at);
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
