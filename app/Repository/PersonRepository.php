<?php

namespace App\Repository;

use App\Contracts\Person\IPersonRepository;
use App\Models\Person;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class PersonRepository extends BaseRepository implements  IPersonRepository {

    public function __construct() {
        parent::__construct(new Person());
    }
    public function getByIdentification(string $identification, string $documentType): ?Model
    {
        // TODO: Implement getByIdentification() method.
        return $this->getModel()->where($documentType, $identification)->first();
    }


    public function createPerson($data): Model
    {
        // TODO: Implement createPerson() method.
        return $this->create($data);
    }

    public function getFilter(array $data): Collection
    {
        // TODO: Implement getFilter() method.
        $query_model = $this->getModel()->query();

        foreach($data as $key => $value) {
            $query_model = $query_model->where($key, $value);
        }
        return $query_model->get();
    }
}
