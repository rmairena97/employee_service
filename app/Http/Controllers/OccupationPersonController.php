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

    /**
     * @OA\Post(
     *     path="/api/setOccupationPerson",
     *     operationId="storingOccupation",
     *     tags={"Occupation"},
     *     summary="Store a new occupation",
     *     description="Storing occupation that belongs to a person",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 type="object",
     *                 required={"person_id", "occupation_id"},
     *                 @OA\Property(property="person_id",type="number"),
     *                 @OA\Property(property="occupation_id",type="number"),
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

    public function setOccupationPerson(OccupationPersonRequest $request) : JsonResponse {
        $result = $this->occupation_action->createOccupationPerson($request->validated());
        return $this->responseWithData($result);
    }
    /**
     * @OA\Get(
     *     path="/api/getOccupationPerson/{occupation_id}",
     *     operationId="personOccupation",
     *     tags={"Occupation"},
     *     summary="Retrieving people by occupation",
     *     description="Searching method to get people by their occupation",
     *     @OA\Parameter (
     *       description="Id of the occupation",
     *       in="path",
     *       name="occupation_id",
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

    public function getOccupationPerson($occupation_id) : JsonResponse {
        $result = $this->occupation_query->getOccupationById($occupation_id);
        return $this->responseWithData($result);
    }
}
