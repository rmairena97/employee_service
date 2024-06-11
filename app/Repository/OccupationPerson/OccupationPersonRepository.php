<?php

namespace App\Repository\OccupationPerson;

use App\Contracts\OccupationPerson\IOccupationPersonActionInterface;
use App\Contracts\OccupationPerson\IOccupationPersonQueryInterface;
use App\Models\OccupationPerson;
use App\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class OccupationPersonRepository extends BaseRepository implements IOccupationPersonActionInterface {

    public function __construct(){
        parent::__construct(new OccupationPerson());
    }
    public function createOccupationPerson($data): Model
    {
        // TODO: Implement createOccupationPerson() method.
        return $this->create($data);
    }

    public function updateOccupationPerson($id, $data): Model
    {
        // TODO: Implement updateOccupationPerson() method.
        return $this->update($id, $data);
    }



}
