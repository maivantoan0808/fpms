<?php

namespace App\Repositories\Eloquent;

use App\Models\DocumentVersion;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interfaces\DocumentVersionRepositoryInterface;

class DocumentVersionRepository extends BaseRepository implements DocumentVersionRepositoryInterface
{
    protected $model;

    /**
     * ProjectsRepository constructor.
     * @param DocumentVersion $article
     */
    public function __construct(DocumentVersion $documentVersion)
    {
        $this->model = $documentVersion;
    }
}
