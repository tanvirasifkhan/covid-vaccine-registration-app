<?php

namespace App\Http\Controllers\VaccineCandidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\VaccineCandidate\ScheduleVaccineCandidateRequest;
use App\Traits\ApiResponse;
use App\Repositories\VaccineCandidateRepository;
use App\Http\Resources\VaccineCandidateResource;
use Illuminate\Http\JsonResponse;

class AssignScheduleVaccineCandidateController extends Controller
{
    use ApiResponse;

    private $scheduleVaccineCandidate;

    public function __construct(VaccineCandidateRepository $vaccineCandidateRepository)
    {
        $this->scheduleVaccineCandidate = $vaccineCandidateRepository;
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(ScheduleVaccineCandidateRequest $scheduleVaccineCandidateRequest, int $id): JsonResponse
    {    
        if($this->scheduleVaccineCandidate->isWeekend($scheduleVaccineCandidateRequest->scheduled_at)){
            return $this->errorResponse(
                errorMessage: 'Selected date has to be a weekday',
                statusCode: 417
            );
        }

        $scheduleVaccineCandidateRequest->validated();

        $candidate = $this->scheduleVaccineCandidate->fetch($id);

        if($candidate == NULL){
            return $this->errorResponse(
                errorMessage: 'Vaccine candidate not found',
                statusCode: 404
            );
        }

        if($this->scheduleVaccineCandidate->alreadyScheduled($id)){
            return $this->successResponse(
                successMessage: 'Vaccine candidate already scheduled',
                statusCode: 200
            );
        }

        $scheduleCandidate = $this->scheduleVaccineCandidate->schedule($scheduleVaccineCandidateRequest->validated(), $id);

        return $this->successResponse(
            successMessage: 'Vaccine candidate scheduled successfully',
            statusCode: 200,
            data: new VaccineCandidateResource($scheduleCandidate)
        );
        
    }
}
