<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CandidateController;
use League\Csv\Reader as CSVReader;
use League\Csv\Statement;
use Illuminate\Support\Facades\DB;

class importAndPrint extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'process:files';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports CSVs into the DB, prints the results of the command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       $importFiles = Storage::disk('csvs');
        
        echo "Processing files:";
        foreach ($importFiles->files() as $fileName) {
            echo "\n" . $fileName . "\n";
            
            $csv = CSVReader::createFromPath(Storage::disk('csvs')->path($fileName), 'r');
            
            $records = collect($csv);

            foreach($records as $record) {
                if($fileName === "candidates.csv") {
                    (new CandidateController)->store($record);
                
                } elseif ($fileName === "jobs.csv") {
                    (new JobController)->store($record);
                } else {
                    echo "\n" . $fileName . " does not match expected name formatting. Please ensure data is correct and is pluralised.";
                }
            }
        }
    }
}


