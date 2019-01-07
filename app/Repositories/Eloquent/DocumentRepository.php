<?php

namespace App\Repositories\Eloquent;

use App\Models\Document;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interfaces\DocumentRepositoryInterface;
use Illuminate\Support\Facades\DB;

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

    public function getDirInProject($projectId)
    {
        $documents = DB::table('documents')
            ->select('documents.*')
            ->join('document_versions', 'documents.document_version_id', '=', 'document_versions.id')
            ->join('projects', 'document_versions.project_id', '=', 'projects.id')
            ->where('projects.id', '=', $projectId)
            ->where('documents.document_type', '=', 'dir')
            ->get();

        return $documents;
    }
}
