<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'meetings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'sprint_id',
        'meeting_type_id',
        'location',
        'hosting_by',
        'time_keeper',
    ];

    public function sprint()
    {
        return $this->belongsTo('App\Models\Sprint', 'sprint_id');
    }

    public function meetingType()
    {
        return $this->belongsTo('App\Models\MeetingType', 'meeting_type_id');
    }

    public function meetingMetas()
    {
        return $this->hasMany('App\Models\MeetingMeta', 'meeting_id');
    }

    public function hostingBy($id)
    {
        return User::find($id);
    }
}
