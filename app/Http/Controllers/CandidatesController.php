<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CandidatesController extends Controller
{
    public function createCandidate(Request $request)
    {
        $candidateName = $request->input('candidateName');

        DB::table('candidates')->insert(
            ['name' => $candidateName, 'votes' => 0]
        );

        return \view('createCandidateForm');
    }

    public function votingPage()
    {
        $candidates = DB::table('candidates')->get();
        return view('voting', ['candidates' => $candidates]);
    }

    public function castYourVote(Request $request)
    {
        $candidateId = $request->input('candidateId');

        DB::table('candidates')->where('id', $candidateId)->update([
            'votes' => DB::raw("votes +1")
        ]);

        return view('home');
    }
}
