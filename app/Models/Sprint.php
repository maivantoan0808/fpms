<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sprint extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sprints';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'release_plan_id',
        'description',
        'sprint',
        'status',
    ];

    protected $appends = ['user_ids'];

    public function release()
    {
        return $this->belongsTo('App\Models\Release', 'release_plan_id');
    }
}
