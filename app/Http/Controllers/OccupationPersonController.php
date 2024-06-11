<?php

namespace App\Http\Controllers;

use App\Contracts\OccupationPerson\IOccupationPersonActionInterface;
use App\Contracts\OccupationPerson\IOccupationPersonQueryInterface;
use App\Http\Requests\OccupationPersonRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OccupationPersonController extends Controller
{
    //

    protected $occupation_query;
    protected $occupation_action;
    public function __construct(IOccupationPersonQueryInterface $occupation_query, IOccupationPersonActionInterface $occupation_action){
        $this->occupation_query = $occupation_query;
        $this->occupation_action = $occupation_action;
    }

    public function setOccupationPerson(OccupationPersonRequest $request) : JsonResponse {
        $result = $this->occupation_action->createOccupationPerson($request->validated());
        return $this->responseWithData($result);
    }
    public function getOccupationPerson($occupation_id) : JsonResponse {
        $result = $this->occupation_query->getOccupationById($occupation_id);
        return $this->responseWithData($result);
    }
}
