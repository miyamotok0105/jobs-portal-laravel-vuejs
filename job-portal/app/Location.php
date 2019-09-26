<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';

    protected $fillable = [
        'name',
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class,'location_id');
    }
}
