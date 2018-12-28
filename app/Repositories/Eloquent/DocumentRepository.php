<?php

namespace App\Repositories\Eloquent;

use App\Models\Document;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interfaces\DocumentRepositoryInterface;

class DocumentRepository extends BaseRepository implements DocumentRepositoryInterface
{
    protected $model;

    /**
     * ProjectsRepository constructor.
     * @param Document $article
     */
    public function __construct(Document $document)
    {
        $this->model = $document;
    }
}
