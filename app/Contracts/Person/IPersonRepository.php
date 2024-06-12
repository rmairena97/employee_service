<?php

namespace App\Contracts\Person;
use Illuminate\Database\Eloquent\Collection;

interface IPersonRepository extends  IQueryPerson, IUpserPerson {
    public function getFilter(array $data) : Collection;
}
