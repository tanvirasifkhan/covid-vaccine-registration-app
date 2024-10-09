<?php

namespace App\Repositories;

use App\Interfaces\VaccineCandidateRepositoryInterface;
use App\Models\VaccineCandidate;
use Illuminate\Database\Eloquent\Collection;

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

    /**
     * fetch all the vaccine candidates
     */
    public function all(): Collection
    {
        return VaccineCandidate::with('vaccineCenter')->orderBy('id', 'DESC')->get();
    }

    /**
     * fetch candidate details by id
     */
    public function fetch(int $id): VaccineCandidate | NULL
    {
        return VaccineCandidate::with('vaccineCenter')->where('id', $id)->first();
    }
}
