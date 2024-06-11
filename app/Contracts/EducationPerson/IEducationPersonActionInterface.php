<?php

namespace App\Contracts\EducationPerson;

use Illuminate\Database\Eloquent\Model;

interface IEducationPersonActionInterface {
    public function createEducationPerson(array $data) : Model;
}
