<?php

namespace App\Contracts\OccupationPerson;

use Illuminate\Database\Eloquent\Model;

interface IOccupationPersonActionInterface {
    public function createOccupationPerson($data) : Model;
    public function updateOccupationPerson($id, $data) : Model;
}
