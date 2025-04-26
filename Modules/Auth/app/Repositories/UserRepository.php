<?php

namespace Modules\Auth\Repositories;

use Modules\Auth\Interfaces\UserInterface;
use Modules\Auth\Models\User;
use Modules\Base\Repositories\BaseRepository;

class UserRepository extends BaseRepository implements UserInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
}
