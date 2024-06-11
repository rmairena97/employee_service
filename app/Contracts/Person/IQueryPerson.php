<?php

namespace App\Contracts\Person;
use Illuminate\Database\Eloquent\Model;

interface IQueryPerson {
    public function getByIdentification(string $identification, string $documentType) : ?Model;

}
