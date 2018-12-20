<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'projects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'image',
        'vision',
        'preface',
        'identifier',
        'public',
        'sub_project_id',
    ];

    public function users()
    {
        return $this->belongsToMany('App\Models\User')->withTimestamps();
    }
}
