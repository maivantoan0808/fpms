<?php

namespace App\Repositories\Eloquent;

use App\Models\Release;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interfaces\ReleaseRepositoryInterface;

class ReleaseRepository extends BaseRepository implements ReleaseRepositoryInterface
{
    protected $model;

    /**
     * ProjectsRepository constructor.
     * @param Project $article
     */
    public function __construct(Release $release)
    {
        $this->model = $release;
    }

    public function getReleasePlansByProject($projectId, $columns = ['*'])
    {
        return $this->model->withCount('project')
            ->whereHas('project', function ($q) use ($projectId) {
                $q->where('projects.id', $projectId);
            })
            ->get($columns);
    }
}
