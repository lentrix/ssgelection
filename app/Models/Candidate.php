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

    public static function getByPosition($position, $dept=false) {
        $cnd = static::where('position', $position)
            ->join('users','users.id','candidates.user_id')
            ->orderByRaw('users.lname, users.fname');

        if($dept) {
            $cnd->where('dept', $dept);
        }

        return $cnd->get();
    }

    public static function getList($position, $dept=false) {
        $data = static::getByPosition($position, $dept);

        $list = [];

        foreach($data as $candidate) {
            $list[$candidate->id] = $candidate->user->fullName . ' - [' . $candidate->party . ']';
        }

        return $list;
    }

}
