<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = ['title','start','end','token'];

    protected $casts = [
        'start' => 'datetime',
        'end' => 'datetime',
    ];

    public function activityCodes() {
        return $this->hasMany('App\Models\ActivityCode')->orderBy('starts');
    }
}
