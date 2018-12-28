<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentVersion extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'document_versions';

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }
}
