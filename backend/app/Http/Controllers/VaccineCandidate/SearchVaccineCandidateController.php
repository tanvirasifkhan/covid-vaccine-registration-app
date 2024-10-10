<?php

namespace App\Http\Controllers\VaccineCandidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\VaccineCandidateResource;
use App\Traits\ApiResponse;
use App\Repositories\VaccineCandidateRepository;
use Illuminate\Http\JsonResponse;

class SearchVaccineCandidateController extends Controller
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
        $nidSearchKeywork = request()->query('nid');

        if($nidSearchKeywork == ""){
            return $this->errorResponse(
                errorMessage: 'Enter your valid NID to track information',
                statusCode: 417
            );
        }

        $candidateInformation = $this->vaccineCandidate->searchByNID($nidSearchKeywork);

        if($candidateInformation == NULL){
            return $this->errorResponse(
                errorMessage: 'Candidate is not registered yet',
                statusCode: 404
            );
        }

        return $this->successResponse(
            successMessage: 'Candidate information found',
            statusCode: 200,
            data: new VaccineCandidateResource($candidateInformation)
        );
    }
}
