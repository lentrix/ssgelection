<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RafflePrize extends Model
{
    use HasFactory;

    protected $fillable = ['item','sponsor','worth', 'created_by', 'quantity'];

    public function createdBy() {
        return $this->belongsTo('App\Models\User','created_by','id');
    }

    public function raffleWinners() {
        return $this->hasMany('App\Models\RaffleWinner');
    }
}
