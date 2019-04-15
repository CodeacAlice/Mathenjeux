<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chapitre;
use App\Testchap;

class ChapitreController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {
        $chapitres = Chapitre::select('idchapters', 'title', 'done', 'link')->get()->toArray();
        return response()->json($chapitres);
    }

    /**
     * Display a listing of the resource.
     * @param int $idchapters
     * @return \Illuminate\Http\Response
     */

    public function show($idchapters) {
    	$chapitres = Chapitre::select('idchapters', 'title', 'done', 'link')->where('idchapters', $idchapters)->get()->toArray();
        //$chapitres = Chapitre::findOrFail($idchapters);
    	return response()->json($chapitres);
    }

    /**
     * Display a listing of the resource.
     * @param int $idchapters
     * @return \Illuminate\Http\Response
     */

    public function showdom($iddomaine) {
        $chapitres = Chapitre::select('idchapters', 'title', 'done', 'link')->where('domaines_iddomaines', $iddomaine)->get()->toArray();
        //$chapitres = Chapitre::findOrFail($idchapters);
        return response()->json($chapitres);
    }

    /**
     * Display the previous chapter.
     * @param str $link
     * @return \Illuminate\Http\Response
     */

    public function showprev($link) {
        $order = Chapitre::select('number')->where('link', $link)->value('number');

        if ($order === 1) {return 'isfirst';}

        $orderprev = $order - 1 ;
        $prev = Chapitre::select('done', 'link')->where('number', $orderprev)->first();

        if (!$prev['done']) {return 'notdone';}

        return $prev['link'];
    }

    /**
     * Display the next chapter.
     * @param str $link
     * @return \Illuminate\Http\Response
     */

    public function shownext($link) {
        $order = Chapitre::select('number')->where('link', $link)->value('number');

        $nbchap = Chapitre::count();
        if ($order === $nbchap) {return 'islast';}

        $ordernext = $order + 1 ;
        $next = Chapitre::select('done', 'link')->where('number', $ordernext)->first();

        if (!$next['done']) {return 'notdone';}

        return $next['link'];
    }
}
