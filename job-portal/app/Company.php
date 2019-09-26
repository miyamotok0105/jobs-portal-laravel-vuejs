<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    protected $fillable = [
        'name',
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class,'company_id');
    }
}
