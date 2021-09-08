<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'candidate_id'];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function candidate() {
        return $this->belongsTo('App\Models\Candidate');
    }

    public function getIsValidAttribute() {
        $sig = md5( config('app.vote_key') . $this->id );
        return $sig==$this->signature;
    }

    public static function createOne($candidate_id) {
        $vote = static::create([
            'user_id' => auth()->user()->id,
            'candidate_id' => $candidate_id
        ]);

        $vote->signature = md5( config('app.vote_key') . $vote->id );
        $vote->save();

        return $vote;
    }

    public static function createMany(array $candidate_ids) {
        $userId = auth()->user()->id;
        $votes = [];
        foreach($candidate_ids as $cid) {
            $vote = Vote::create([
                'user_id' => $userId,
                'candidate_id' => $cid
            ]);
            $vote->signature = md5( config('app.vote_key') . $vote->id );
            $vote->save();
            $votes[] = $vote;
        }

        return $votes;
    }
}
