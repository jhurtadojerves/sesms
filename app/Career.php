<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $fillable = [
      'code', 'name', 'foundation', 'acronym', 'id_school'
    ];

    public function school() {
        return $this->belongsTo('App\School', 'id_school');
    }

    public function meshes() {
        return $this->hasMany('App\Mesh');
    }


}
