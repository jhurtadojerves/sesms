<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesh extends Model
{
    protected $fillable = [
        'code', 'name', 'life', 'okay', 'id_career'
    ];

    public function career() {
        return $this->belongsTo('App\Career', 'id_career');
    }

    public function subjects() {
        return $this->hasMany('App\Subject', 'id_mesh');
    }

}
