<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable =['title','video_id','description','tags','viewable_event_id'];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function viewableEvent() {
        return $this->belongsTo('App\Models\ViewableEvent');
    }
}
