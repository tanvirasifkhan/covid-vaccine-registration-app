<?php

namespace App\Http\Controllers\VaccineCandidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\VaccineCandidate\RegisterVaccineCandidateRequest;
use App\Http\Resources\VaccineCandidateResource;
use App\Traits\ApiResponse;
use App\Repositories\VaccineCandidateRepository;
use Illuminate\Http\JsonResponse;

class RegisterVaccineCandidateController extends Controller
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
    public function __invoke(RegisterVaccineCandidateRequest $registerVaccineCandidateRequest): JsonResponse
    {
        if(!$this->vaccineCandidate->canAccomodateCandidates($registerVaccineCandidateRequest->center_id)){
            return $this->errorResponse(
                errorMessage: 'Sorry ! This center is already out of its capacity',
                statusCode: 417
            );
        }

        $candidate = $this->vaccineCandidate->store($registerVaccineCandidateRequest->validated());

        return $this->successResponse(
            successMessage: 'Vaccine candidate registered successfully',
            statusCode: 201,
            data: new VaccineCandidateResource($candidate)
        );
    }
}
