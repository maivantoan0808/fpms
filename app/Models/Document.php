<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'documents';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'document_version_id',
        'name',
        'text',
        'document_parent',
        'document_type',
        'icon',
        'document_ext',
        'document_link',
    ];

    public function documentVersion()
    {
        return $this->belongsTo('App\Models\DocumentVersion');
    }
}
