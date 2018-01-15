<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $fillable = [
        'code', 'name', 'foundation', 'acronym', 'id_faculty'
    ];

    public function schools() {
        return $this->hasMany('App\School');
    }
}
