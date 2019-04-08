<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domaine extends Model
{
    protected $table = 'domaines';
    protected $filelabel = ['iddomaines', 'name'];
    public $timestamps = false;

    public function chapitres() {
    	return $this->hasMany(Chapitre::class);
    }
}
