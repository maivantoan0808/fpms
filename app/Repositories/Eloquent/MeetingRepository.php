<?php

namespace App\Repositories\Eloquent;

use App\Models\Meeting;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interfaces\MeetingRepositoryInterface;

class MeetingRepository extends BaseRepository implements MeetingRepositoryInterface
{
    protected $model;

    /**
     * ProjectsRepository constructor.
     * @param Project $article
     */
    public function __construct(Meeting $meeting)
    {
        $this->model = $meeting;
    }
}
