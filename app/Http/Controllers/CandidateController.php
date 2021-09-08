<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index() {
        $pres = Candidate::getByPosition('President');
        $vps = Candidate::getByPosition('Vice-President');
        $sens = Candidate::getByPosition('Senator');
        $reps = Candidate::getByPosition('Representative');

        return view('candidates.index', [
            'pres' => $pres,
            'vps' => $vps,
            'sens' => $sens,
            'reps' => $reps,
        ]);
    }

    public function show(Candidate $candidate) {
        return view('candidates.view', compact('candidate'));
    }

    public function update(Request $request, Candidate $candidate) {
        $candidate->update($request->all());
        return redirect('/candidates/' . $candidate->id);
    }
}
