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
}
