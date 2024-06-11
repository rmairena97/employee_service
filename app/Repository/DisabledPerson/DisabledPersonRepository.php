<?php

namespace App\Repository\DisabledPerson;

use App\Contracts\DisabledPerson\IDisabledPersonActionsInterface;
use App\Contracts\DisabledPerson\IDisabledPersonQueryInterface;
use App\Models\DisabledPerson;
use App\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class DisabledPersonRepository extends BaseRepository implements IDisabledPersonActionsInterface {


    public function __construct()
    {
        parent::__construct(new DisabledPerson());
    }

    public function CreateDisablePerson(array $data): Model
    {
        // TODO: Implement CreateDisablePerson() method.
        return  $this->create($data);

    }

    public function UpdateDisablePerson(int $id, array $data): Model
    {
        // TODO: Implement UpdateDisablePerson() method.
        return $this->update($id, $data);
    }

}
