<?php

namespace App\Http\Controllers;

use App\Contracts\BankData\IBankDataInterface;
use App\Http\Requests\BankDataRequest;
use Illuminate\Http\JsonResponse;

class BankDataPersonController extends Controller
{
    //
    protected $bank_repo;
    public function __construct(IBankDataInterface $bank_repo)
    {
        $this->bank_repo = $bank_repo;
    }

    /**
     * @OA\Post(
     *     path="/api/setBankDataPerson",
     *     operationId="StoringBankData",
     *     tags={"BankData"},
     *     summary="Store the bank account of a person",
     *     description="Storing bank account that belongs to a person",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 type="object",
     *                 required={"person_id", "bank_name", "account_number"},
     *                 @OA\Property(property="person_id",type="number"),
     *                 @OA\Property(property="bank_name",type="text"),
     *                 @OA\Property(property="account_number",type="number"),
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

    public function setBankDataPerson(BankDataRequest $request) : JsonResponse{
        $result = $this->bank_repo->createBankData($request->validated());
        return $this->responseWithData($result, 201);
    }
}
