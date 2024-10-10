<?php

namespace App\Interfaces;

use App\Models\VaccineCandidate;
use Illuminate\Database\Eloquent\Collection;

interface VaccineCandidateRepositoryInterface
{
    public function store(array $data): VaccineCandidate;

    public function all(): Collection;

    public function fetch(int $id): VaccineCandidate | NULL;

    public function schedule(array $data, int $id): VaccineCandidate | NULL;

    public function alreadyScheduled(int $id): bool;

    public function countCandidatesByCenter(int $centerId): int;

    public function canAccomodateCandidates(int $centerId): bool;

    public function isWeekend(string $scheduleDate): bool;

    public function searchByNID(string $nid): VaccineCandidate | NULL;

}
