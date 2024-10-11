<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\VaccineCandidate;
use App\Notifications\VaccineCandidateScheduleEmailNotification;

class SendScheduleEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:vaccine-schedule-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending vaccine candidates schedule email';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        date_default_timezone_set('Asia/Dhaka');

        $candidates = VaccineCandidate::all();

        $candidates->map(function($candidate){
            $previousDate = date_format(
                date_sub(date_create($candidate->scheduled_at), 
                date_interval_create_from_date_string('1 days')),
                'Y-m-d'
            );
    
            if(date('Y-m-d') == $previousDate){
                $candidate->notify(new VaccineCandidateScheduleEmailNotification($candidate));
            }
        });
    }
}
