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
}
