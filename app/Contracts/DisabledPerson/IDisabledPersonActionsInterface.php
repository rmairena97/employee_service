<?php

namespace App\Contracts\DisabledPerson;

use Illuminate\Database\Eloquent\Model;

interface IDisabledPersonActionsInterface {
    public function CreateDisablePerson(array $data) : Model;
    public function UpdateDisablePerson(int $id, array $data) : Model;
}
