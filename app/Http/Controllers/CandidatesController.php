<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        //check if user has already voted for
        if (!Auth::user()->has_voted) {
            $candidates = DB::table('candidates')->get();
            return view('voting', ['candidates' => $candidates]);
        } else {
            // user already voted for
            return view('home');
        }
    }

    public function castYourVote(Request $request)
    {
        $candidateId = $request->input('candidateId');

        DB::table('candidates')->where('id', $candidateId)->update([
            'votes' => DB::raw("votes +1")
        ]);

        // change the has_voted value from 0 to 1
        DB::table('users')->where('id', Auth::user()->id)->update([
            'has_voted' => 1
        ]);

        // return but with a message
        // return view('home');
        return \redirect('home')->with('flashMessage', 'You voted successfully. Results will be available on Sunday');
    }
}
