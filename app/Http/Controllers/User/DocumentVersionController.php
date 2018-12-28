<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ProjectRepositoryInterface;
use App\Repositories\Interfaces\DocumentVersionRepositoryInterface;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\DocumentVersionRequest;

class DocumentVersionController extends Controller
{
    protected $documentVersion;
    protected $project;

    public function __construct(
        ProjectRepositoryInterface $project,
        DocumentVersionRepositoryInterface $documentVersion
    ) {
        $this->project = $project;
        $this->documentVersion = $documentVersion;
    }

    public function store(DocumentVersionRequest $request, $id)
    {
        $project = $this->project->find($id);
        $data = array_merge($request->all(), [
            'project_id' => $project->id,
        ]);
        
        $documentVersion = $this->documentVersion->store($data);
        Toastr::success('Document Version Successfully Created', 'Success');

        return redirect()->route('user.project.show', $id);
    }
}
