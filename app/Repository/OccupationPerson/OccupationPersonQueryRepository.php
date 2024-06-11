<?php

namespace App\Repository\OccupationPerson;

use App\Contracts\OccupationPerson\IOccupationPersonQueryInterface;
use App\Models\OccupationPerson;
use App\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class OccupationPersonQueryRepository extends BaseRepository implements IOccupationPersonQueryInterface
{
    public function __construct(){
        parent::__construct(new OccupationPerson());
    }
    public function getOccupationById($occupation_id): Collection
    {
        // TODO: Implement getOccupationById() method.
        return $this->getModel()->where('occupation_id', $occupation_id)->get();
    }
}
