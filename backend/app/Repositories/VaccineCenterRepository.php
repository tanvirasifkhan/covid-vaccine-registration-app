<?php

namespace App\Repositories;

use App\Interfaces\VaccineCenterRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use App\Models\VaccineCenter;

class VaccineCenterRepository implements VaccineCenterRepositoryInterface
{
    /**
     * fetch all the vaccine centers
     */
    public function all(): Collection
    {
        return VaccineCenter::with('vaccineCandidate')->orderBy('id', 'DESC')->get();
    }
}
