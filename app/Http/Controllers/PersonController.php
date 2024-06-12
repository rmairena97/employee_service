<?php

namespace App\Http\Controllers;

use App\Contracts\Person\IPersonRepository;
use App\Http\Requests\GetPersonRequest;
use App\Http\Requests\PersonRequest;
use App\Http\Requests\QueryPersonRequest;
use App\Http\Resources\PersonResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class PersonController extends Controller
{
    //

    protected IPersonRepository $person_repo;
    public function __construct(IPersonRepository $repo){
        $this->person_repo = $repo;
    }

    /**
     * @OA\Post(
     *     path="/api/person/getPersonById",
     *     operationId="SearchingPersonByDocument",
     *     tags={"Person"},
     *     summary="Search for a person",
     *     description="You can search for a person depending on their documents, you can specified the document with theses [cui, passport, nit]",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 type="object",
     *                 required={"document_type","identification"},
     *                 @OA\Property(property="document_type",type="text"),
     *                 @OA\Property(property="identification",type="text"),
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
     *     ),
     * )
     */
    public function getPersonById(GetPersonRequest $request) : JsonResponse {
        $result = $this->person_repo->getByIdentification($request->get('identification'), $request->get('document_type'));
        $response = $result ? new PersonResource($result) : $result;
        return $this->responseWithData($response);
    }

    /**
     * @OA\Post(
     *     path="/api/person/store",
     *     operationId="StoringPeople",
     *     tags={"Person"},
     *     summary="Store a new person",
     *     description="This action allows you to store a person in the database",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 type="object",
     *                 required={"document","f_name","s_name", "f_surname", "l_surname", "birth_date", "children_count", "marital_state_id", "gender_id", "linguistic_community_id", "ethnicity_id"},
     *                 @OA\Property(property="document",type="text"),
     *                 @OA\Property(property="cui",type="text"),
     *                 @OA\Property(property="passport",type="text"),
     *                 @OA\Property(property="nit",type="text"),
     *                 @OA\Property(property="f_name",type="text"),
     *                 @OA\Property(property="s_name",type="text"),
     *                 @OA\Property(property="f_surname",type="text"),
     *                 @OA\Property(property="l_surname",type="text"),
     *                 @OA\Property(property="house_surname",type="text"),
     *                 @OA\Property(property="igss",type="text"),
     *                 @OA\Property(property="birth_date",type="text"),
     *                 @OA\Property(property="children_count",type="number"),
     *                 @OA\Property(property="marital_state_id",type="number"),
     *                 @OA\Property(property="gender_id",type="number"),
     *                 @OA\Property(property="linguistic_community_id",type="number"),
     *                 @OA\Property(property="ethnicity_id",type="number"),
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


    public function store(PersonRequest $request) : JsonResponse {
        $result = $this->person_repo->create($request->validated());
        return response()->json(new PersonResource($result));
    }

    /**
     * @OA\Post(
     *     path="/api/person/search",
     *     operationId="FilterByParams",
     *     tags={"Person"},
     *     summary="Search for a person",
     *     description="Apply the filter with one or many params contains in the person model",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(property="cui",type="text"),
     *                 @OA\Property(property="passport",type="text"),
     *                 @OA\Property(property="nit",type="text"),
     *                 @OA\Property(property="f_name",type="text"),
     *                 @OA\Property(property="s_name",type="text"),
     *                 @OA\Property(property="other_name",type="text"),
     *                 @OA\Property(property="f_surname",type="text"),
     *                 @OA\Property(property="l_surname",type="text"),
     *                 @OA\Property(property="birth_date",type="text"),
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="Data Found",
     *          @OA\JsonContent()
     *      ),
     *     @OA\Response(
     *        response="404",
     *        description="No data found",
     *      @OA\JsonContent()
     *  ),
     * )
     */
    public function search(QueryPersonRequest $request): JsonResponse {
        $result = $this->person_repo->getFilter($request->validated());
        return $this->responseWithData(PersonResource::collection($result));
    }
    /**
     * @OA\Put (
     *     path="/api/person/update",
     *     operationId="updateByParams",
     *     tags={"Person"},
     *     summary="Update a person",
     *     description="Update a resource",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 type="object",
     *                  required={"id"},
     *                 @OA\Property(property="id",type="number"),
     *                 @OA\Property(property="f_name",type="text"),
     *                 @OA\Property(property="s_name",type="text"),
     *                 @OA\Property(property="other_name",type="text"),
     *                 @OA\Property(property="f_surname",type="text"),
     *                 @OA\Property(property="l_surname",type="text"),
     *                 @OA\Property(property="birth_date",type="text"),
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="Success",
     *          @OA\JsonContent()
     *      ),
     *     @OA\Response(
     *        response="404",
     *        description="No data found",
     *      @OA\JsonContent()
     *  ),
     * )
     */

    public function update(PersonRequest $request) : JsonResponse {
        $result =   $this->person_repo->updatePerson($request->get('id'), $request->except('id'));
        return $this->responseWithData($result, 204);
    }
}
