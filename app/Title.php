<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $fillable = [
        'name', 'nivel'
    ];

    public function users(){
        return $this->belongsToMany('App\User');
    }


}
