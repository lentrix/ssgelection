<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'position', 'party', 'tag_line', 'short_bio'];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public static function getList($position, $dept=false) {
        $cnd = static::where('position', $position);
        if($dept) {
            $cnd->whereHas('user', function($query) use ($dept) {
                $query->where('dept', $dept);
            });
        }

        $data = $cnd->get();

        $list = [];

        foreach($data as $candidate) {
            $list[$candidate->id] = $candidate->user->fullName . ' - [' . $candidate->party . ']';
        }

        return $list;
    }
}
