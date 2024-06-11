<?php


namespace App\Contracts\OccupationPerson;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface IOccupationPersonQueryInterface
{
    public function getOccupationById($occupation_id) : Collection;
}
