<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $table = 'evaluations';
    protected $fillable = ['id', 'question', 'answer'];
    public $timestamps = false;


    public function chapters() {
    	return $this->belongsTo(Chapter::class);
    }
}
