<?php

namespace App\Repositories\Eloquent;

use App\Models\Sprint;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interfaces\SprintRepositoryInterface;

class SprintRepository extends BaseRepository implements SprintRepositoryInterface
{
    protected $model;

    /**
     * ProjectsRepository constructor.
     * @param Project $article
     */
    public function __construct(Sprint $sprint)
    {
        $this->model = $sprint;
    }
}
