<?php

namespace App\Enums;

enum VaccineCandidateStatus: string
{
    case SCHEDULED = "scheduled";
    case VACCINATED = "vaccinated";
}
