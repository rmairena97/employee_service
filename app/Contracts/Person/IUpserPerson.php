<?php

namespace App\Contracts\Person;
use Illuminate\Database\Eloquent\Model;

interface IUpserPerson {
    public function createPerson($data) : Model;
}
