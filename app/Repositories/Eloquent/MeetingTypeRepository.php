<?php

namespace App\Repositories\Eloquent;

use App\Models\MeetingType;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interfaces\MeetingTypeRepositoryInterface;

class MeetingTypeRepository extends BaseRepository implements MeetingTypeRepositoryInterface
{
    protected $model;

    /**
     * ProjectsRepository constructor.
     * @param Project $article
     */
    public function __construct(MeetingType $meetingType)
    {
        $this->model = $meetingType;
    }
}
