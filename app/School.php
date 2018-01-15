<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{

    protected $fillable = [
        'code', 'name', 'foundation', 'acronym', 'id_faculty'
    ];

    public function careers() {
        return $this->hasMany('App\Career', 'id_career');
    }

    public function faculty() {
        return $this->belongsTo('App\Faculty', 'id_faculty');
    }

}
