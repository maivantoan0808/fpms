<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Release extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'release_plans';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_id',
        'release_date',
        'goal',
        'note',
        'version',
    ];

    protected $appends = ['user_ids'];

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }

    public function sprints()
    {
        return $this->hasMany('App\Models\Sprint', 'release_plan_id');
    }
}
