<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\VaccineCandidateResource;

class VaccineCenterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'capacity' => $this->limit,
            'totalOccupied' => $this->vaccineCandidate->count(),
            'address' => $this->address,
            'canAccomodate' => $this->limit > $this->vaccineCandidate->count()
        ];
    }
}
