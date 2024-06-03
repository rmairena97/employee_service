<?php

namespace App\Http\Controllers;

use App\Contracts\Person\IPersonRepository;
use App\Http\Requests\GetPersonRequest;
use App\Http\Requests\PersonRequest;
use App\Http\Resources\PersonResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    //

    protected $person_repo;
    public function __construct(IPersonRepository $repo){
        $this->person_repo = $repo;
    }
    public function getPersonById(GetPersonRequest $request) : JsonResponse{
        $result = $this->person_repo->getByIdentification($request->get('document_type'), $request->get('identification'));
        return response()->json(new PersonResource($result));
    }

    public function store(PersonRequest $request) : JsonResponse{
        $result = $this->person_repo->create($request->validated());
        return response()->json(new PersonResource($result));
    }
}
