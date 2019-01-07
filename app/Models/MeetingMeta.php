<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeetingMeta extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'meeting_meta';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'meeting_key',
        'meeting_id',
        'meeting_value',
    ];

    public function sprint()
    {
        return $this->belongsTo('App\Models\Meeting', 'meeting_id');
    }
}
