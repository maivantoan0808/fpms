<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Project;
use App\Helper\GoogleDriveHelper;

class MakeFolderProject implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $project;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        GoogleDriveHelper::makeDirProject($this->project->name);
        GoogleDriveHelper::makeSubDir($this->project->name);
        GoogleDriveHelper::makeDir($this->project->name, 'Document', 'Requirement');
        GoogleDriveHelper::makeDir($this->project->name, 'Document', 'Design');
        GoogleDriveHelper::makeDir($this->project->name, 'Document', 'Q_A');
        GoogleDriveHelper::makeDir($this->project->name, 'Document', 'Test');
        GoogleDriveHelper::makeDir($this->project->name, 'Document', 'Process');
        GoogleDriveHelper::makeDir($this->project->name, 'Management', 'Project Member Info');
        GoogleDriveHelper::makeDir($this->project->name, 'Management', 'Project Meeting');
        GoogleDriveHelper::makeDir($this->project->name, 'Management', 'Report');
        GoogleDriveHelper::makeDir($this->project->name, 'Management', 'Progress Management');
    }
}
