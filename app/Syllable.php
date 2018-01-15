<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Syllable extends Model
{

    protected $table = 'syllables';

    protected $fillable = [
        'sede', 'delivery', 'id_ups', 'ups'
    ];

    public function evaluations() {
        return $this->hasMany('App\Evaluation');
    }

    public function scenarios() {
        return $this->hasMany('App\Scenario');
    }

    public function units() {
        return $this->hasMany('App\Unit', 'id_syllable');
    }

    public function ups() {
        return $this->belongsTo('App\Ups', 'id_ups');
    }

}
