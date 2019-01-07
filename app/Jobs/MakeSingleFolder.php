<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Helper\GoogleDriveHelper;

class MakeSingleFolder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $projectName;
    protected $parentName;
    protected $name;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($projectName, $parentName, $name)
    {
        $this->projectName = $projectName;
        $this->parentName = $parentName;
        $this->name = $name;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        GoogleDriveHelper::makeDir($this->projectName, $this->parentName, $this->name);
    }
}
