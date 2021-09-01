<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ElectionController extends Controller
{
    public function votingForm() {
        $user = auth()->user();

        //check voting period
        $from = Carbon::createFromFormat('Y-m-d H:i', config('app.election_start'));
        $to = Carbon::createFromFormat('Y-m-d H:i', config('app.election_end'));
        $now = Carbon::now();

        if(!$now->isAfter($from)) {
            return redirect('/candidates')->with('Info','The election period has not started yet.');
        }

        if(!$now->isBefore($to)) {
            return redirect('/results')->with('Error','The election period has already expired.');
        }

        //check if user has not voted yet
        if($user->voted_at!=null) {
            return view('election.voted', compact('user'));
        }

        $pres = Candidate::getList('President');
        $vpres = Candidate::getList('Vice President');
        $sens = Candidate::getList('Senator');
        $reps = Candidate::getList('Representative', true);

        return view('election.voting-form', [
            'user' => $user,
            'pres' => $pres,
            'vpres' => $vpres,
            'sens' => $sens,
            'reps' => $reps
        ]);
    }
}
