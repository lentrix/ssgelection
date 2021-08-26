<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActivityCode extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'activity_id', 'code'];

    public function activityCode() {
        return $this->belongsTo('App\Models\ActivityCode');
    }

    public function getAcceptedAttribute() {
        $activityCode = ActivityCode::where('activity_id', $this->activity_id)
            ->where('code', $this->code)->first();

        return $activityCode->starts->isBefore($this->created_at) && $activityCode->expires->isAfter($this->created_at);
    }
}