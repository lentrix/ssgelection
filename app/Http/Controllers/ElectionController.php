<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\User;
use App\Models\Vote;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ElectionController extends Controller
{
    public function index() {
        if(auth()->user()->voted_at !== null) {
            return $this->voted();
        }else {
            return $this->votingForm();
        }
    }

    public function voted() {
        return view('election.voted');
    }

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

        $pres = Candidate::getByPosition('President');
        $vpres = Candidate::getByPosition('Vice-President');
        $sens = Candidate::getByPosition('Senator');
        $reps = Candidate::getByPosition('Representative', $user->dept);

        return view('election.voting-form', [
            'user' => $user,
            'pres' => $pres,
            'vpres' => $vpres,
            'sens' => $sens,
            'reps' => $reps
        ]);
    }

    public function vote(User $user, Request $request) {
        if($user->id !== auth()->user()->id || auth()->user()->id === $request->user_id) {
            return back()->with('Error','Fatal Error: There is inconsistency of data.');
        }

        $pr = Candidate::where('user_id',$request->president)->first();
        $vp = Candidate::where('user_id',$request['vice-president'])->first();
        $sn = Candidate::whereIn('user_id', json_decode($request->senator))->get();
        $rp = Candidate::where('user_id',$request->representative)->first();

        return view('election.confirm-votes',[
            'pr' => $pr,
            'vp' => $vp,
            'sn' => $sn,
            'rp' => $rp,
        ]);
    }

    public function confirmVote(User $user, Request $request) {
        Vote::createOne($request['president']);
        Vote::createOne($request['vice-president']);
        Vote::createMany($request['senator']);
        Vote::createOne($request['representative']);

        $user->voted_at = now();
        $user->save();
        return redirect('/election');
    }
}
