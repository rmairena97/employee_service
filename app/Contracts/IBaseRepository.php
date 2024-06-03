<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;

interface IBaseRepository {
    public function findById(int $id) : Model;
    public function create(array $data) : Model;
    public function update(int $id, array $data) : Model;
    public function delete(int $id) : void;
}
