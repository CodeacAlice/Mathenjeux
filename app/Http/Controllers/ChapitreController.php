<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chapitre;
use App\Testchap;

class ChapitreController extends Controller
{
	/**
     * Display a listing of the resource.
     * @param int $idchapters
     * @return \Illuminate\Http\Response
     */

    public function show($idchapters) {
    	$chapitres = Chapitre::select('idchapters', 'title')->where('idchapters', $idchapters)->get()->toArray();
    	return response()->json($chapitres);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {
    	$chapitres = Chapitre::select('idchapters', 'title', 'done', 'link')->get()->toArray();
    	return response()->json($chapitres);
    }
}
