<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;

class CandidateController extends Controller
{
    public function store($candidate) {
        $newCandidate = Candidate::firstOrCreate([
            
            'first_name' => $candidate[1],
            'last_name' => $candidate[2],
            'email' => $candidate[3],
        ]);
        $newCandidate->save();
    }
}
