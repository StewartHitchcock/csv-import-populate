<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Job;

class Candidate extends Model
{
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'email'
    ];

    public function jobs() {
        return $this->hasMany(Job::class);
    }
}
