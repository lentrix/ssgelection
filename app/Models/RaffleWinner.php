<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaffleWinner extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'item_id', 'drawn_by'];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function raffleItem() {
        return $this->belongsTo('App\Models\RaffleItem');
    }

    public function drawnBy() {
        return $this->belongsTo('App\Models\User','drawn_by','id');
    }
}
