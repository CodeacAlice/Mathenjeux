<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chapter;
use App\Evaluation;

class ChapterController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {
        $chapters = Chapter::select('id', 'title', 'iscomplete', 'link')->get()->toArray();
        return response()->json($chapters);
    }

    /**
     * Display one chapter.
     * @param int $idchapter
     * @return \Illuminate\Http\Response
     */

    public function show($idchapter) {
        $chapters = Chapter::findOrFail($idchapter);
    	return response()->json($chapters);
    }

    /**
     * Display a listing of the chapters of one field.
     * @param int $idfield
     * @return \Illuminate\Http\Response
     */

    public function showfield($idfield) {
        $chapters = Chapter::select('id', 'title', 'iscomplete', 'link', 'order')
            ->where('fields_id', $idfield)
            ->orderBy('order', 'asc')
            ->get()->toArray();
        return response()->json($chapters);
    }

    /**
     * Display the previous chapter.
     * @param str $link
     * @return \Illuminate\Http\Response
     */

    public function showprev($link) {
        $order = Chapter::select('order')->where('link', $link)->value('order');

        if ($order === 1) {return 'isfirst';}

        $orderprev = $order - 1 ;
        $prev = Chapter::select('iscomplete', 'link')->where('order', $orderprev)->first();

        if (!$prev['iscomplete']) {return 'notdone';}

        return $prev['link'];
    }

    /**
     * Display the next chapter.
     * @param str $link
     * @return \Illuminate\Http\Response
     */

    public function shownext($link) {
        $order = Chapter::select('order')->where('link', $link)->value('order');

        $nbchap = Chapter::count();
        if ($order === $nbchap) {return 'islast';}

        $ordernext = $order + 1 ;
        $next = Chapter::select('iscomplete', 'link')->where('order', $ordernext)->first();

        if (!$next['iscomplete']) {return 'notdone';}

        return $next['link'];
    }
}
