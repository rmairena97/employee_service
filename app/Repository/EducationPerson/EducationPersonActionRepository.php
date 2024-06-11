<?php

namespace App\Repository\EducationPerson;

use App\Contracts\EducationPerson\IEducationPersonActionInterface;
use App\Models\EducationPerson;
use App\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class EducationPersonActionRepository extends  BaseRepository implements IEducationPersonActionInterface
{

    public function __construct(){
        parent::__construct(new EducationPerson());
    }
    public function createEducationPerson(array $data): Model
    {
        // TODO: Implement createEducationPerson() method.
        return $this->create($data);
    }
}
