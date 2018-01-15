<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
      'code' , 'name', 'hp', 'ha', 'ht', 'credits', 'prerequisites', 'corequisites', 'level'
    ];

    public function mesh() {
        return $this->belongsTo('App\Mesh', 'id_mesh');
    }

    public function upss() {
        return $this->hasMany('App\Ups', 'id_subject');
    }

}
