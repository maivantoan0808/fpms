<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Helper\GoogleDriveHelper;
use Illuminate\Support\Facades\Storage;

class DeleteSingleFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $projectName;
    protected $name;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($projectName, $name)
    {
        $this->projectName = $projectName;
        $this->name = $name;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $file = GoogleDriveHelper::findFile($this->projectName, $this->name);

        Storage::cloud()->delete($file['path']);
    }
}
