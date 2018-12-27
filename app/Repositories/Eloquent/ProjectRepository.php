<?php

namespace App\Repositories\Eloquent;

use App\Models\Project;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interfaces\ProjectRepositoryInterface;

class ProjectRepository extends BaseRepository implements ProjectRepositoryInterface
{
    protected $model;

    /**
     * ProjectsRepository constructor.
     * @param Project $article
     */
    public function __construct(Project $project)
    {
        $this->model = $project;
    }

    /**
     * List Projects User Doing
     * @param int $userId
     * @param array  $columns
     * @return mixed
     */
    public function getProjectsByUser($userId, $columns = ['*'])
    {
        return $this->model->withCount('users')
            ->whereHas('users', function ($q) use ($userId) {
                $q->where('users.id', $userId);
            })
            ->get($columns);
    }

    /**
     * Attach the project for the user.
     *
     * @param Project $project
     * @param array $attachData
     * @return void
     */
    public function attachPositionUser($projectId, array $attachData, $positionId)
    {
        $project = $this->model->find($projectId);
        
        return $project->users()->attach($attachData, ['position_id' => $positionId]);
    }

    /**
     * List Projects User Doing
     * @param int $userId
     * @param array  $columns
     * @return mixed
     */
    public function getUsersOfProjectWithPosition($projectId, $positionId)
    {
        $project = $this->model->find($projectId);

        return $project->users()->wherePivot('position_id', $positionId)->get(['users.id', 'name']);
    }
}
