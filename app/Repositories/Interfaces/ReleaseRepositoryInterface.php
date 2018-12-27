<?php

namespace App\Repositories\Interfaces;

use App\Repositories\Interfaces\BaseRepositoryInterface;

interface ReleaseRepositoryInterface extends BaseRepositoryInterface
{
    public function getReleasePlansByProject($userId, $columns = ['*']);
}
