<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewableEvent extends Model
{
    use HasFactory;

    protected $fillable = ['title','start','end'];

    protected $casts = [
        'created_at' => 'datetime',
        'start' => 'datetime',
        'end' => 'datetime',
    ];

    public function videos() {
        return $this->hasMany('App\Models\Video');
    }
}
