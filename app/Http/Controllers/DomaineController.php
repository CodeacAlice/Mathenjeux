<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domaine;
use App\Chapitre;

class DomaineController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {
    	$domaines = Domaine::select('iddomaines', 'name')->get()->toArray();
    	return response()->json($domaines);
    }
}
