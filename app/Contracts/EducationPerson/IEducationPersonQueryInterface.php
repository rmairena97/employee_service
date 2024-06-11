<?php

namespace App\Contracts\EducationPerson;

use Illuminate\Database\Eloquent\Collection;

interface IEducationPersonQueryInterface {
    public function getEducationPersonByProps(array $data) : Collection;
}
