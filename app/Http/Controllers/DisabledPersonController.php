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

    /**
     * @OA\Post(
     *     path="/api/setDisability",
     *     operationId="StoringPeopleDisability",
     *     tags={"PeopleDisability"},
     *     summary="Store a new disability",
     *     description="Storing disablitity that a person have",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 type="object",
     *                 required={"person_id", "disabled_id", "disabled_level_id"},
     *                 @OA\Property(property="person_id",type="number"),
     *                 @OA\Property(property="disabled_id",type="number"),
     *                 @OA\Property(property="disabled_level_id",type="number"),
     *             ),
     *         ),
     *     ),
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

    public function setDisability(PersonDisabilityRequest $request) : JsonResponse {
        $result = $this->action_repository->CreateDisablePerson($request->validated());
        return $this->responseWithData($result);
    }

    /**
     * @OA\Get(
     *     path="/api/getPersonByDisability/{disability_id}",
     *     operationId="retrievingPeopleByDisability",
     *     tags={"PeopleDisability"},
     *     summary="Retrieving people by disability",
     *     description="Searching method to get people by their disability",
     *     @OA\Parameter (
     *       description="Id of the disability",
     *       in="path",
     *       name="disability_id",
     *       required=true,
     *       example=1,
     *       @OA\Schema (
     *           type="integer",
     *           format="int64"
     *       )
     *     ),
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

    public function getPersonByDisability($disability_id) : JsonResponse {
        $data_found = $this->query_repository->getDisabledPersonByDisabledId($disability_id);
        return $this->responseWithData($data_found);
    }

}
