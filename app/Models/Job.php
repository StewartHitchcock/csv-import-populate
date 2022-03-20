<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\Candidate;

class Job extends Model
{
    protected $fillable = [
        'id',
        'candidate_id',
        'job_title',
        'company',
        'start_date',
        'end_date'
    ];
    
    public function candidate() {
        return $this->belongsTo(Candidate::class);
    }
}
