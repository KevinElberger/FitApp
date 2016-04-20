<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Users can have many workouts.
     *
     * @return mixed
     */
    public function workouts() {
        return $this->hasMany('App\Workout');
    }

    /**
     * Users can have many weights.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function weights() {
        return $this->hasMany('App\Weight');
    }
}
