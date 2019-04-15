<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $table = 'evaluations';
    protected $filelabel = ['idevaluations', 'question', 'answer'];
    public $timestamps = false;


    public function chapitres() {
    	return $this->belongsTo(Chapitre::class);
    }
}
