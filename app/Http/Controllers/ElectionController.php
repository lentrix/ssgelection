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
        $sn = Candidate::whereIn('user_id', $request->senator?json_decode($request->senator):[])->get();
        $rp = Candidate::where('user_id',$request->representative)->first();

        return view('election.confirm-votes',[
            'pr' => $pr,
            'vp' => $vp,
            'sn' => $sn,
            'rp' => $rp,
        ]);
    }

    public function confirmVote(User $user, Request $request) {

        if($user->voted_at) {
            return redirect('/election')->with('Error','Our records indicate that you have already voted.');
        }

        if($request['president']) {
            Vote::createOne($request['president']);
        }

        if($request['vice-president']) {
            Vote::createOne($request['vice-president']);
        }

        if($request['senator']){
            Vote::createMany($request['senator']);
        }

        if($request['representative']){
            Vote::createOne($request['representative']);
        }

        $user->voted_at = now();
        $user->save();
        return redirect('/election');
    }

    public function results() {
        $to = Carbon::createFromFormat('Y-m-d H:i', config('app.election_end'));
        $now = Carbon::now();

        if($now->isBefore($to) && !auth()->user()->is_admin) {
            return view('election.on-going');
        }

        $result = [
            'President' => Candidate::count("President"),
            'Vice-President' => Candidate::count("Vice-President"),
            'Senator' => Candidate::count("Senator"),
            'CAST Representative' => Candidate::count("Representative", 'CAST'),
            'CABM-B Representative' => Candidate::count("Representative", 'CABM-B'),
            'CABM-H Representative' => Candidate::count("Representative", 'CABM-H'),
            'CCJ Representative' => Candidate::count("Representative", 'CCJ'),
            'CON Representative' => Candidate::count("Representative", 'CON'),
            'COE Representative' => Candidate::count("Representative", 'COE'),
        ];

        // dd($result);
        return view('election.result', compact('result'));
    }
}
