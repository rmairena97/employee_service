<?php

namespace App\Http\Controllers;

use App\Contracts\EducationPerson\IEducationPersonActionInterface;
use App\Contracts\EducationPerson\IEducationPersonQueryInterface;
use App\Http\Requests\EducationPersonQueryRequest;
use App\Http\Requests\EducationPersonRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EducationPersonController extends Controller
{
    //
    protected $education_query;
    protected $education_action;
    public function __construct(IEducationPersonQueryInterface $education_query, IEducationPersonActionInterface $education_action) {
        $this->education_query = $education_query;
        $this->education_action = $education_action;
    }

    public function setEducationPerson(EducationPersonRequest $request) : JsonResponse {
        $result = $this->education_action->createEducationPerson(data:  $request->validated());
        return $this->responseWithData($result);
    }

    public function getEducationPerson(EducationPersonQueryRequest $request) : JsonResponse {
        $data_retrieved = $this->education_query->getEducationPersonByProps(data:  $request->validated());
        return $this->responseWithData($data_retrieved);
    }
}
