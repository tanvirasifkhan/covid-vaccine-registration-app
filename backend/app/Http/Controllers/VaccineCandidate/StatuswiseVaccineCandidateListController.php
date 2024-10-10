<?php

namespace App\Http\Controllers\VaccineCandidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\VaccineCandidateResource;
use App\Traits\ApiResponse;
use App\Repositories\VaccineCandidateRepository;
use Illuminate\Http\JsonResponse;
use App\Enums\VaccineCandidateStatus;

class StatuswiseVaccineCandidateListController extends Controller
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
        if(!in_array($request->status, VaccineCandidateStatus::toArray())){
            return $this->errorResponse(
                errorMessage: 'Invalid status',
                statusCode: 417
            );
        }

        $candidates = $this->vaccineCandidate->fetchByStatus($request->status);

        $countCandidates = $this->vaccineCandidate->fetchByStatus($request->status)->count();

        $message = $countCandidates > 0 ? $countCandidates . ' Candidates found' : 'No Candidates found';

        return $this->successResponse(
            successMessage: $message,
            statusCode: 200,
            data: VaccineCandidateResource::collection($candidates)
        );
    }
}
