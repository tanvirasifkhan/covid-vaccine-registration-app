<?php

namespace App\Http\Controllers\VaccineCandidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\VaccineCandidateRepository;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\VaccineCandidateResource;

class ReadVaccineCandidateController extends Controller
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
    public function __invoke(Request $request, int $id): JsonResponse
    {
        $candidate = $this->vaccineCandidate->fetch($id);

        if($candidate == NULL){
            return $this->errorResponse(
                errorMessage: 'Vaccine candidate not found',
                statusCode: 404
            );
        }

        return $this->successResponse(
            successMessage: 'Vaccine candidate info fetched',
            statusCode: 200,
            data: new VaccineCandidateResource($candidate)
        );
    }
}
