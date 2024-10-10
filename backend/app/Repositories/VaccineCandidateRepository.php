<?php

namespace App\Repositories;

use App\Interfaces\VaccineCandidateRepositoryInterface;
use App\Models\VaccineCandidate;
use Illuminate\Database\Eloquent\Collection;
use App\Enums\VaccineCandidateStatus;

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
        return VaccineCandidate::with('vaccineCenter')->get();
    }

    /**
     * fetch candidate details by id
     */
    public function fetch(int $id): VaccineCandidate | NULL
    {
        return VaccineCandidate::with('vaccineCenter')->where('id', $id)->first();
    }

    /**
     * scheduling vaccine candidate
     */
    public function schedule(array $data, int $id): VaccineCandidate | NULL
    {
        VaccineCandidate::where('id', $id)->update([
            'scheduled_at' => $data['scheduled_at'],
            'status' => VaccineCandidateStatus::SCHEDULED
        ]);

        return $this->fetch($id);
    }

    /**
     * check whether the candidate is already scheduled or not
     */
    public function alreadyScheduled(int $id): bool
    {
        return $this->fetch($id)->status == VaccineCandidateStatus::SCHEDULED->value;
    }
}
