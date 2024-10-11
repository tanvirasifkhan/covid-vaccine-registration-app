<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\VaccineCandidate;
use App\Enums\VaccineCandidateStatus;

class ChangeStatusToVaccinated extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'change:candidate-status-to-vaccinated';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change candidate status to vaccinated';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        date_default_timezone_set('Asia/Dhaka');

        $candidates = VaccineCandidate::all();

        $candidates->map(function($candidate){
            
            $scheduledDate = date_format(date_create($candidate->scheduled_at), 'Y-m-d');
    
            if(date('Y-m-d') > $scheduledDate){
                VaccineCandidate::where('id', $candidate->id)->update(['status' => VaccineCandidateStatus::VACCINATED]);
            }

        });
    }
}
