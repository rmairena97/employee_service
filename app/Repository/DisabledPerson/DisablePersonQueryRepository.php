<?php

namespace App\Repository\DisabledPerson;

use App\Contracts\DisabledPerson\IDisabledPersonQueryInterface;
use App\Models\DisabledPerson;
use App\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class DisablePersonQueryRepository extends BaseRepository implements IDisabledPersonQueryInterface {

    public function __construct(){
        parent::__construct(new DisabledPerson());
    }
    public function getDisabledPersonById(int $id): ?Model
    {
        // TODO: Implement getDisabledPersonById() method.
        return $this->findById($id);
    }

    public function getDisabledPersonByDisabledId(int $id): Collection
    {
        // TODO: Implement getDisabledPersonByDisabledId() method.
        return $this->getModel()->where('disabled_id', $id)->get();
    }
}
