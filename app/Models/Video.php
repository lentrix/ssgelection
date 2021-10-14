<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Video extends Model
{
    use HasFactory;

    protected $appends =['view_count'];

    protected $fillable =['title','video_id','description','tags','viewable_event_id'];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function viewableEvent() {
        return $this->belongsTo('App\Models\ViewableEvent');
    }

    public function getViewCountAttribute() {
        return DB::table('views')->where('video_id', $this->id)->count();
    }
}
