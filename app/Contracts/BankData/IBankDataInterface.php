<?php

namespace App\Contracts\BankData;

use Illuminate\Database\Eloquent\Model;

interface IBankDataInterface {
    public function createBankData(array $data) : Model;
    public function updateBankData(array $data) : Model;
}
