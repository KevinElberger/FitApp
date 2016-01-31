<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    protected $fillable = [
        'name',
        'weight',
        'sets',
        'reps',
        'date',
        'user_id'
    ];

    /**
     * Workouts are owned by users.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo('App\User');
    }
}
