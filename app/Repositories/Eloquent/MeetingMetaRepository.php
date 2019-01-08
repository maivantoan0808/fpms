<?php

namespace App\Repositories\Eloquent;

use App\Models\MeetingMeta;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interfaces\MeetingMetaRepositoryInterface;

class MeetingMetaRepository extends BaseRepository implements MeetingMetaRepositoryInterface
{
    protected $model;

    /**
     * ProjectsRepository constructor.
     * @param Project $article
     */
    public function __construct(MeetingMeta $meetingMeta)
    {
        $this->model = $meetingMeta;
    }
}
