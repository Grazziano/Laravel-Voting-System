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
}
