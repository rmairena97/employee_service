<?php

namespace App\Repository;

use App\Contracts\IBaseRepository;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements IBaseRepository {

    protected $model;
    public function __construct(Model $model) {
        $this->model = $model;
    }
    public function findById(int $id): Model
    {
        // TODO: Implement findById() method.
        return $this->model::where('id', $id)->first();
    }

    public function create(array $data): Model
    {
        // TODO: Implement create() method.
        return $this->model::create($data);
    }

    public function update(int $id, array $data): Model
    {
        // TODO: Implement update() method.
        $data_to_modify = $this->model::where('id', $id)->first();
        $data_to_modify->update($data);
        return $data_to_modify;
    }

    public function delete(int $id): void
    {
        // TODO: Implement delete() method.
        $this->model::where('id',$id)->delete();
    }

    public function getModel(): Model {
        return $this->model;
    }
}
