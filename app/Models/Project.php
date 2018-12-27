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

    protected $appends = ['user_ids'];

    public function users()
    {
        return $this->belongsToMany('App\Models\User')->withTimestamps()->withPivot('position_id');
    }

    public function getUserIdsAttribute()
    {
        return $this->users()->pluck('user_id');
    }

    public function releases()
    {
        return $this->hasMany('App\Models\Release');
    }
}
