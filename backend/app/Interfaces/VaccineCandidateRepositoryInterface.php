<?php

namespace App\Interfaces;

use App\Models\VaccineCandidate;

interface VaccineCandidateRepositoryInterface
{
    public function store(array $data): VaccineCandidate;
}
