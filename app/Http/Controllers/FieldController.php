<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Field;
use App\Chapter;

class FieldController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {
    	$fields = Field::select('id', 'name')->get()->toArray();
    	return response()->json($fields);
    }
    

    /**
     * Display one field.
     *
     * @return \Illuminate\Http\Response
     */

    public function show($id) {
    	$field = Field::findOrFail($id);
    	return response()->json($field);
    }
}
