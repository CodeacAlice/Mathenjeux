<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $table = 'fields';
    protected $fillable = ['id', 'name'];
    public $timestamps = false;

    public function chapters() {
    	return $this->hasMany(Chapter::class);
    }
}
