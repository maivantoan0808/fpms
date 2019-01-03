<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\DocumentRepositoryInterface;
use App\Repositories\Interfaces\ProjectRepositoryInterface;
use App\Repositories\Interfaces\DocumentVersionRepositoryInterface;
use App\Helper\GoogleDriveHelper;
use Brian2694\Toastr\Facades\Toastr;

class DocumentController extends Controller
{
    protected $document;
    protected $project;
    protected $documentVersion;

    public function __construct(
        DocumentRepositoryInterface $document,
        ProjectRepositoryInterface $project,
        DocumentVersionRepositoryInterface $documentVersion
    ) {
        $this->document = $document;
        $this->project = $project;
        $this->documentVersion = $documentVersion;
    }

    public function storeDefault($id)
    {
        $project = $this->project->find($id);

        $documentVersion = $this->documentVersion->store([
            'name' => $project->name . ' v1',
            'project_id' => $project->id,
        ]);

        $documentDocument = $this->document->store([
            'document_version_id' => $documentVersion->id,
            'name' => 'Document',
            'text' => 'Document',
            'document_parent' => $project->id . 'v1',
            'document_type' => 'dir',
            'icon' => config('fpms.icon.folder'),
        ]);
        $documentManagement = $this->document->store([
            'document_version_id' => $documentVersion->id,
            'name' => 'Management',
            'text' => 'Management',
            'document_parent' => $project->id . 'v1',
            'document_type' => 'dir',
            'icon' => config('fpms.icon.folder'),
        ]);
        $documentPublic = $this->document->store([
            'document_version_id' => $documentVersion->id,
            'name' => 'Public',
            'text' => 'Public',
            'document_parent' => $project->id . 'v1',
            'document_type' => 'dir',
            'icon' => config('fpms.icon.folder'),
        ]);

        $this->document->store([
            'document_version_id' => $documentVersion->id,
            'name' => 'Requirement',
            'text' => 'Requirement',
            'document_parent' => $documentDocument->id,
            'document_type' => 'dir',
            'icon' => config('fpms.icon.folder'),
        ]);
        $this->document->store([
            'document_version_id' => $documentVersion->id,
            'name' => 'Design',
            'text' => 'Design',
            'document_parent' => $documentDocument->id,
            'document_type' => 'dir',
            'icon' => config('fpms.icon.folder'),
        ]);
        $this->document->store([
            'document_version_id' => $documentVersion->id,
            'name' => 'Q_A',
            'text' => 'Q_A',
            'document_parent' => $documentDocument->id,
            'document_type' => 'dir',
            'icon' => config('fpms.icon.folder'),
        ]);
        $this->document->store([
            'document_version_id' => $documentVersion->id,
            'name' => 'Test',
            'text' => 'Test',
            'document_parent' => $documentDocument->id,
            'document_type' => 'dir',
            'icon' => config('fpms.icon.folder'),
        ]);
        $this->document->store([
            'document_version_id' => $documentVersion->id,
            'name' => 'Process',
            'text' => 'Process',
            'document_parent' => $documentDocument->id,
            'document_type' => 'dir',
            'icon' => config('fpms.icon.folder'),
        ]);

        $this->document->store([
            'document_version_id' => $documentVersion->id,
            'name' => 'Project Member Info',
            'text' => 'Project Member Info',
            'document_parent' => $documentManagement->id,
            'document_type' => 'dir',
            'icon' => config('fpms.icon.folder'),
        ]);
        $this->document->store([
            'document_version_id' => $documentVersion->id,
            'name' => 'Project Meeting',
            'text' => 'Project Meeting',
            'document_parent' => $documentManagement->id,
            'document_type' => 'dir',
            'icon' => config('fpms.icon.folder'),
        ]);
        $this->document->store([
            'document_version_id' => $documentVersion->id,
            'name' => 'Report',
            'text' => 'Report',
            'document_parent' => $documentManagement->id,
            'document_type' => 'dir',
            'icon' => config('fpms.icon.folder'),
        ]);
        $this->document->store([
            'document_version_id' => $documentVersion->id,
            'name' => 'Progress Management',
            'text' => 'Progress Management',
            'document_parent' => $documentManagement->id,
            'document_type' => 'dir',
            'icon' => config('fpms.icon.folder'),
        ]);

        Toastr::success('Document Default Successfully Created', 'Success');

        return redirect()->back();
    }
}
