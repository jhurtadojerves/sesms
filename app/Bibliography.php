<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GrahamCampbell\Markdown\Facades\Markdown;

class Bibliography extends Model
{
    protected $fillable = [
        'id', 'type', 'syllable_id', 'author', 'year', 'title', 'format', 'publication_place', 'recovered', 'isbn',
    ];

    public function syllable() {
        return $this->belongsTo('App\Syllable');
    }

    public function safeHTML($string){
        return Markdown::convertToHtml(e($string));
    }
}
