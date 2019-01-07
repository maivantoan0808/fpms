<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Helper\GoogleDriveHelper;
use Illuminate\Support\Facades\Storage;

class MakeSingleFile implements ShouldQueue
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
        $fileGet = Storage::disk('public')->get(config('fpms.temporary_file') . '/' . $this->name);
        $parentPath = GoogleDriveHelper::getPath($this->projectName, $this->parentName);
        Storage::cloud()->put($parentPath . '/' . $this->name, $fileGet);
        Storage::disk('public')->delete(config('fpms.temporary_file') . '/' . $this->name);
    }
}
