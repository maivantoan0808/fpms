<?php

namespace App\Repositories\Interfaces;

use App\Repositories\Interfaces\BaseRepositoryInterface;

interface ProjectRepositoryInterface extends BaseRepositoryInterface
{
    public function getProjectsByUser($userId, $columns = ['*']);
}
