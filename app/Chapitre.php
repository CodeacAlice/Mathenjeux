<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapitre extends Model
{
    protected $table = 'chapters';
    protected $filelabel = ['idchapters', 'title'];
    public $timestamps = false;


    public function evaluations() {
    	return $this->hasMany(Evaluation::class);
    }
    public function domaines() {
    	return $this->belongsTo(Domaine::class);
    }
}
