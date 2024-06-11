<?php

namespace App\Http\Controllers;

use App\Contracts\DisabledPerson\IDisabledPersonActionsInterface;
use App\Contracts\DisabledPerson\IDisabledPersonQueryInterface;
use App\Http\Requests\PersonDisabilityRequest;
use Illuminate\Http\JsonResponse;

class DisabledPersonController extends Controller
{
    //
    protected $query_repository;
    protected $action_repository;
    public function __construct(IDisabledPersonActionsInterface $action_repository, IDisabledPersonQueryInterface $query_repository ) {
        $this->query_repository = $query_repository;
        $this->action_repository = $action_repository;
    }

    public function setDisability(PersonDisabilityRequest $request) : JsonResponse {
        $result = $this->action_repository->CreateDisablePerson($request->validated());
        return $this->responseWithData($result);
    }

    public function getPersonByDisability($disability_id) : JsonResponse {
        $data_found = $this->query_repository->getDisabledPersonByDisabledId($disability_id);
        return $this->responseWithData($data_found);
    }

}
