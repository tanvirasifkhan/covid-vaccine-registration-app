<?php

namespace App\Repositories;

use App\Interfaces\VaccineCandidateRepositoryInterface;
use App\Models\VaccineCandidate;

class VaccineCandidateRepository implements VaccineCandidateRepositoryInterface
{
    /**
     * register new candidate
     */
    public function store(array $data): VaccineCandidate
    {
        return VaccineCandidate::create([
            'center_id' => $data['center_id'],
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'nid' => $data['nid']
        ]);
    }
}
