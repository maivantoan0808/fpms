<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $model;

    /**
     * ProjectsRepository constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * Get all normal user
     * @param array  $columns
     * @return mixed
     */
    public function getNormalUser($columns = ['*'])
    {
        return $this->model->where('role_id', 2)->get($columns);
    }

    /**
     * List Projects User Doing
     * @param int $userId
     * @param array  $columns
     * @return mixed
     */
    public function getUsersOfProject($projectId, $columns = ['*'])
    {
        return $this->model->with('projects')
            ->whereHas('projects', function ($q) use ($projectId) {
                $q->where('projects.id', $projectId);
            })
            ->get($columns);
    }
}
