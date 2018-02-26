<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = [
        'activity', 'first', 'second', 'third', 'principal', 'recovery', 'id_syllable'
    ];

    public function syllable() {
        return $this->belongsTo('App\Syllable', 'id_syllable');
    }

}
