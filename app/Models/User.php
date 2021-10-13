<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idnum',
        'lname',
        'fname',
        'email',
        'program',
        'year',
        'dept',
        'password',
        'access_token',
        'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullNameAttribute() {
        return $this->lname . ', ' . $this->fname;
    }

    public function rafflePrizes() {
        return $this->hasMany('App\Models\RaffleWinner', 'user_id','id');
    }

    public function userActivityCodes() {
        return $this->hasMany('App\Models\UserActivityCode');
    }

    public function views() {
        return $this->hasMany('App\Model\Views');
    }
}
