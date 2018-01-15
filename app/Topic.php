<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
        'name', 'subtopics', 'id_unit'
    ];

    public function unit() {
        return $this->belongsTo('App\Unit', 'id_unit');
    }
}
