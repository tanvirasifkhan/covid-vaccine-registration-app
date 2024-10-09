<?php

namespace App\Http\Controllers\VaccineCandidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\VaccineCandidateRepository;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\VaccineCandidateResource;

class ReadAllVaccineCandidateController extends Controller
{
    use ApiResponse;

    private $vaccineCandidate;

    public function __construct(VaccineCandidateRepository $vaccineCandidateRepository)
    {
        $this->vaccineCandidate = $vaccineCandidateRepository;
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): JsonResponse
    {
        $candidates = $this->vaccineCandidate->all();

        return $this->successResponse(
            successMessage: 'Vaccine candidate list fetched',
            statusCode: 200,
            data: VaccineCandidateResource::collection($candidates)
        );
    }
}
