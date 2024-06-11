<?php

namespace App\Repository\EducationPerson;

use App\Contracts\EducationPerson\IEducationPersonQueryInterface;
use App\Models\EducationPerson;
use App\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class EducationPersonQueryRepository extends BaseRepository implements IEducationPersonQueryInterface
{

    public function __construct(){
        parent::__construct(new EducationPerson());
    }
    public function getEducationPersonByProps(array $data): Collection
    {
        // TODO: Implement getEducationPersonByParams() method.
        $base_query = $this->getModel()->query();
        foreach($data as $key => $param){
            $base_query->where($key, '=', $param);
        }
        return $base_query->get();
    }
}
