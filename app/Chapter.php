<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $table = 'chapters';
    protected $fillable = ['id', 'title'];
    public $timestamps = false;


    public function evaluations() {
    	return $this->hasMany(Evaluation::class);
    }
    public function fields() {
    	return $this->belongsTo(Field::class);
    }
}
