<?php

namespace App\Http\Controllers\Vaccine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Traits\ApiResponse;
use App\Http\Resources\VaccineCenterResource;
use App\Repositories\VaccineCenterRepository;

class ReadVaccineCenterController extends Controller
{
    use ApiResponse;

    private $vaccineCenter;

    public function __construct(VaccineCenterRepository $vaccineCenterRepository)
    {
        $this->vaccineCenter = $vaccineCenterRepository;
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): JsonResponse
    {
        $vaccineCenters = $this->vaccineCenter->all();

        return $this->successResponse(
            successMessage: 'Vaccine center datas fetched',
            statusCode: 200,
            data: VaccineCenterResource::collection($vaccineCenters)
        );
    }
}
