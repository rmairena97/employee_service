<?php

namespace App\Http\Controllers;

use App\Contracts\EducationPerson\IEducationPersonActionInterface;
use App\Contracts\EducationPerson\IEducationPersonQueryInterface;
use App\Http\Requests\EducationPersonQueryRequest;
use App\Http\Requests\EducationPersonRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Mockery\Matcher\Any;

class EducationPersonController extends Controller
{
    //
    protected $education_query;
    protected $education_action;
    public function __construct(IEducationPersonQueryInterface $education_query, IEducationPersonActionInterface $education_action) {
        $this->education_query = $education_query;
        $this->education_action = $education_action;
    }
    /**
     * @OA\Post(
     *     path="/api/setPersonByEducation",
     *     operationId="StoringEducationPerson",
     *     tags={"Education"},
     *     summary="Store the education of a person",
     *     description="Storing education that belongs to a person",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 type="object",
     *                 required={"person_id", "academic_level_id"},
     *                 @OA\Property(property="person_id",type="number"),
     *                 @OA\Property(property="academic_level_id",type="number"),
     *                 @OA\Property(property="academic_degree_id",type="number"),
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Data Found",
     *         @OA\JsonContent()
     *     ),
     *      @OA\Response(
     *          response="201",
     *          description="Resource created",
     *          @OA\JsonContent()
     *      ),
     *     @OA\Response(
     *       response="404",
     *       description="No data found",
     *       @OA\JsonContent()
     *      ),
     *      @OA\Response(
     *        response="422",
     *        description="Unprocessable Entity",
     *      @OA\JsonContent()
     *     ),
     * )
     */

    public function setEducationPerson(EducationPersonRequest $request) : JsonResponse {
        $result = $this->education_action->createEducationPerson(data:  $request->validated());
        return $this->responseWithData($result, code: 201);
    }

    /**
     * @OA\Post(
     *     path="/api/getPersonByEducation",
     *     operationId="personEducation",
     *     tags={"Education"},
     *     summary="Retrieving people by education",
     *     description="Searching method to get people by their education",
     *     @OA\RequestBody(
     *          @OA\JsonContent(),
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  type="object",
     *                  required={"academic_level_id"},
     *                  @OA\Property(property="academic_level_id",type="number"),
     *                  @OA\Property(property="academic_degree_id",type="number"),
     *              ),
     *          ),
     *      ),
     *     @OA\Response(
     *         response="200",
     *         description="Data Found",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *       response="404",
     *       description="No data found",
     *       @OA\JsonContent()
     *      ),
     *      @OA\Response(
     *        response="422",
     *        description="Unprocessable Entity",
     *      @OA\JsonContent()
     *     ),
     * )
     */

    public function getEducationPerson(EducationPersonQueryRequest $request) : JsonResponse {
        $data_retrieved = $this->education_query->getEducationPersonByProps( array_filter($request->validated(), fn($item) => !is_null($item)));
        return $this->responseWithData($data_retrieved);
    }
}
