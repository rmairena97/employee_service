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

    public function setBankDataPerson(BankDataRequest $request) : JsonResponse{
        $result = $this->bank_repo->createBankData($request->validated());
        return $this->responseWithData($result);
    }
}
