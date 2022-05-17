<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityCode extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $casts = [
        'starts' => 'datetime',
        'expires' => 'datetime',
    ];

    protected $fillable = ['activity_id', 'code', 'starts', 'expires'];

    public function Activity() {
        return $this->belongsTo('App\Models\Activity');
    }

    public function check(User $user) {
        return UserActivityCode::where('user_id',$user->id)
            ->where('activity_id', $this->activity_id)
            ->where('code', $this->code)
            ->first();
    }

    public function getSubmissionCountAttribute() {
        return UserActivityCode::where('code', $this->code)->count();
    }
}
