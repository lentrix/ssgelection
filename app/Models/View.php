<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'video_id'];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function video() {
        return $this->belongsTo('App\Models\Video');
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
