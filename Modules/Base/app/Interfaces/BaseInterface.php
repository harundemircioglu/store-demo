<?php

namespace Modules\Base\Interfaces;

interface BaseInterface
{
    public function getAll();

    public function find(int $id);

    public function store(array $data);

    public function update(array $data, int $id);

    public function destroy(int $id);
}
