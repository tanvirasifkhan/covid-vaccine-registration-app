<?php

use Illuminate\Support\Facades\Schedule;
use App\Models\VaccineCandidate;
use App\Notifications\VaccineCandidateScheduleEmailNotification;
use App\Console\Commands\SendScheduleEmail;

Schedule::command('send:vaccine-schedule-email')->timezone('Asia/Dhaka')->withoutOverlapping()->at("21:00");

Schedule::command('change:candidate-status-to-vaccinated')->timezone('Asia/Dhaka')->at("24:01");