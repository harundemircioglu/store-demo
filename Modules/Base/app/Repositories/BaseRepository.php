<?php

namespace Modules\Base\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Base\Interfaces\BaseInterface;

class BaseRepository implements BaseInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll(Model $model)
    {
        return $this->model->all();
    }

    public function find(Model $model, int $id)
    {
        return $this->model->find($id);
    }

    public function store(Model $model, array $data)
    {
        return $this->model->create($data);
    }

    public function update(Model $model,  array $data, int $id)
    {
        $record = $this->model->find($id);

        if ($record) {
            $record->update($data);
            return $record;
        }

        return null;
    }

    public function destroy(Model $model, int $id)
    {
        $record = $this->model->find($id);

        if ($record) {
            $record->delete();
        }

        return null;
    }
}
