<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staff_members';
    protected $fillable = ['position', 'user_id', 'signature', 'signature_position'];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
