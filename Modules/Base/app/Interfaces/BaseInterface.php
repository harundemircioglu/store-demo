<?php

namespace Modules\Base\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface BaseInterface
{
    public function getAll(Model $model);

    public function find(Model $model, int $id);

    public function store(Model $model, array $data);

    public function update(Model $model, array $data, int $id);

    public function destroy(Model $model, int $id);
}
