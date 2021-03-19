<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CandidatesController extends Controller
{
    public function home()
    {
        $candidates = DB::table('candidates')->get();
        return view('home', ['candidates' => $candidates]);
    }

    public function createCandidate(Request $request)
    {
        $candidateName = $request->input('candidateName');

        DB::table('candidates')->insert(
            ['name' => $candidateName, 'votes' => 0]
        );

        return \view('createCandidateForm');
    }

    public function createCandidateForm()
    {
        if (Auth::check() && Auth::user()->is_admin) {
            return view('createCandidateForm');
        } else {
            return \redirect('/')->with('flashMessageProblem', 'You are not autorized to enter this page!');
        }
    }

    public function votingPage()
    {
        // if user is not logged in then send them to register
        if (!Auth::check()) {
            return \redirect('/register');
            //check if user has already voted for
        } else if (!Auth::user()->has_voted) {
            $candidates = DB::table('candidates')->get();
            return view('voting', ['candidates' => $candidates]);
        } else if (now() > date('2021-11-11 00:00:00')) {
            return \redirect('/')->with('flashMessageProblem', 'You can no longer vote. Polls closed!');
        } else {
            // user already voted for
            return \redirect('/')->with('flashMessageProblem', 'You have already voted');
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

        // store which candidate user voted for
        DB::table('users')->where('id', Auth::user()->id)->update([
            'candidate_voted_for' => $candidateId
        ]);

        // return but with a message
        return \redirect('/')->with('flashMessage', 'You voted successfully. Results will be available on Sunday');
    }
}
