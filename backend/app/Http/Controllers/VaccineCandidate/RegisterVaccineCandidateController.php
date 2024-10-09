<?php

namespace App\Http\Controllers\VaccineCandidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\VaccineCandidate\RegisterVaccineCandidateRequest;
use App\Http\Resources\VaccineCandidateResource;
use App\Traits\ApiResponse;
use App\Repositories\VaccineCandidateRepository;

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
    public function __invoke(RegisterVaccineCandidateRequest $registerVaccineCandidateRequest)
    {
        $candidate = $this->vaccineCandidate->store($registerVaccineCandidateRequest->validated());

        return $this->successResponse(
            successMessage: 'Vaccine candidate registered successfully',
            statusCode: 201,
            data: new VaccineCandidateResource($candidate)
        );
    }
}
