<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Helper\GoogleDriveHelper;
use Illuminate\Support\Facades\Storage;
use App\Models\Document;

class UpdateLinkDocument implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $projectName;
    protected $name;
    protected $id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($projectName, $name, $id)
    {
        $this->projectName = $projectName;
        $this->name = $name;
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $file = GoogleDriveHelper::findFile($this->projectName, $this->name);
        $documentLink = Storage::cloud()->url($file['path']);
        $document = Document::where('id', $this->id)->firstOrFail();
        $document->update(['document_link' => $documentLink]);
    }
}
