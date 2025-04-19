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

    public function getAll()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        $record = $this->model->find($id);

        if ($record) {
            return $record;
        }

        return null;
    }

    public function store(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        $record = $this->model->find($id);

        if ($record) {
            return $record->update($data);
        }

        return null;
    }

    public function destroy($id)
    {
        $record = $this->model->find($id);

        if ($record) {
            return $record->delete();
        }

        return null;
    }
}
