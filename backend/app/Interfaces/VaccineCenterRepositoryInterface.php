<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface VaccineCenterRepositoryInterface
{
    public function all(): Collection;    
}