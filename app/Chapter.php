<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $table = 'chapters';
    protected $filelabel = ['id', 'title'];
    public $timestamps = false;


    public function evaluations() {
    	return $this->hasMany(Evaluation::class);
    }
    public function domaines() {
    	return $this->belongsTo(Field::class);
    }
}
