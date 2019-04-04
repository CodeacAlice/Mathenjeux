<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testchap extends Model
{
    protected $table = 'testschap';
    public $timestamps = false;


    public function chapitre() {
    	return $this->belongsTo(Chapitre::class);
    }
}
