<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GrahamCampbell\Markdown\Facades\Markdown;

class Unit extends Model
{
    protected $fillable = [
        'name', 'objetive', 'achievement', 'methodological_strategy', 'resources', 'classroom_activities', 'autonomous_activities', 'id_syllable', 'number'
    ];

    public function syllable() {
        return $this->belongsTo('App\Syllable', 'id_syllable');
    }

    public function topics() {
        return $this->hasMany('App\Topic', 'id_unit');
    }

    public function safeHTML($string){
        return Markdown::convertToHtml(e($string));
    }

}
