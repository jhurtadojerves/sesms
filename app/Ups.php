<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ups extends Model
{
    protected $table = 'user_period_subject';
    protected $fillable = [
      'id_user', 'id_period', 'id_subject'
    ];

    public function user() {
        return $this->belongsTo('App\User', 'id_user');
    }

    public function period() {
        return $this->belongsTo('App\Period', 'id_period');
    }

    public function subject() {
        return $this->belongsTo('App\Subject', 'id_subject');
    }

    public function syllable() {
        return $this->hasOne('App\Syllable', 'id_syllable');
    }
}
