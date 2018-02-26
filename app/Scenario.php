<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scenario extends Model
{
    protected $fillable = [
        'name', 'type', 'id_syllable'
    ];

    public function syllable() {
        return $this->belongsTo('App\Syllable', 'id_syllable');
    }

}
