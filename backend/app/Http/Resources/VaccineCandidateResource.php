<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\VaccineCenterResource;
use App\Enums\VaccineCandidateStatus;

class VaccineCandidateResource extends JsonResource
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
            'center' => new VaccineCenterResource($this->vaccineCenter),
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'nid' => $this->nid,
            'status' => $this->status == NULL ? 'registered' : $this->status,
            'scheduled_at' => $this->scheduled_at != NULL ? [
                'raw' => date_format(date_create($this->scheduled_at), 'd-m-Y'),
                'human' => date_format(date_create($this->scheduled_at), 'd M D, Y')
            ]: NULL,
        ];
    }
}
