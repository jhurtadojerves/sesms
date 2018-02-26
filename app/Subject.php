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

    public function getStringLevelAttribute() {
        $levels = [
            1   => 'Primero',
            2   => 'Segundo',
            3   => 'Tercero',
            4   => 'Cuarto',
            5   => 'Quinto',
            6   => 'Sexto',
            7   => 'Séptimo',
            8   => 'Octavo',
            9   => 'Noveno ',
            10  => 'Décimo',
            11  => 'Undécimo',
        ];
        return $levels[$this->level];
    }

}
