<?php

namespace App\Repository\BankData;

use App\Contracts\BankData\IBankDataInterface;
use App\Models\BankAccountData;
use App\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class BankDataRepository extends BaseRepository implements IBankDataInterface{

    public function __construct(){
        parent::__construct(new BankAccountData());
    }
    public function createBankData(array $data): Model
    {
        // TODO: Implement createBankData() method.
        return $this->create($data);
    }

    public function updateBankData(array $data): Model
    {
        // TODO: Implement updateBankData() method.
    }
}
