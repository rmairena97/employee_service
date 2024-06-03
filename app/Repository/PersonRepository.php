<?php

namespace App\Repository;

use App\Contracts\Person\IPersonRepository;
use App\Models\Person;
use Illuminate\Database\Eloquent\Model;

class PersonRepository extends BaseRepository implements  IPersonRepository {

    public function __construct() {
        parent::__construct(new Person());
    }
    public function getByIdentification(string $identification, string $documentType): Model
    {
        // TODO: Implement getByIdentification() method.
        return $this->getModel()->where($documentType, $identification)->first();
    }


    public function createPerson($data): Model
    {
        // TODO: Implement createPerson() method.
        return $this->create($data);
    }
}
