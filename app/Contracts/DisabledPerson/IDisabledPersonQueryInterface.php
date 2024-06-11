<?php

namespace App\Contracts\DisabledPerson;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface IDisabledPersonQueryInterface {
    public function getDisabledPersonById(int $id) : ?Model;
    public function getDisabledPersonByDisabledId(int $id) : Collection;
}
