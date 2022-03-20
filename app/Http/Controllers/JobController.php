<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function store($job) {
        $newJob = Job::firstOrCreate([
            "candidate_id"=> $job[1],
            "job_title" => $job[2],
            "company" => $job[3],
            "start_date" => date('Y-m-d H:i:s', strtotime($job[4])),
            "end_date" => date('Y-m-d H:i:s', strtotime($job[5])),
        ]);
     $newJob->save();
      
    }
}
