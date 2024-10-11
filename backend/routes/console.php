<?php

use Illuminate\Support\Facades\Schedule;
use App\Models\VaccineCandidate;
use App\Notifications\VaccineCandidateScheduleEmailNotification;
use App\Console\Commands\SendScheduleEmail;

Schedule::command('send:vaccine-schedule-email')->timezone('Asia/Dhaka')->at("06:17");