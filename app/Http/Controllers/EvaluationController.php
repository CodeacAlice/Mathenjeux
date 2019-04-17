<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evaluation;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {
    	$eval = Evaluation::select('id', 'question', 'answer', 'chapters_id')->get()->toArray();
    	return response()->json($eval);
    }


    /**
     * Display one evaluation
     * @param int $ideval
     * @return \Illuminate\Http\Response
     */

    public function show($ideval) {
        $eval = Evaluation::findOrFail($ideval);
    	//$eval = Evaluation::select('id', 'question', 'answer', 'chapters_id')->where('id', $ideval)->get()->toArray();
    	return response()->json($eval);
    }

    /**
     * Display a number of evaluations of one chapter.
     * @param int $idchap
     * @return \Illuminate\Http\Response
     */

    public function evalachap(Request $request, int $idchap) {
    	$nbquest = $request->nbtot;
        $alleval = Evaluation::select('id', 'question')->where('chapters_id', $idchap)->get()->toArray();
        $eval = [];
        for ($i=0; $i < $nbquest; $i++) { 
        	$index = rand(0,count($alleval)-1);
        	$eval[] = array_splice($alleval, $index, 1)[0];
        }
        return $eval;
    }

    /**
     * Check if an evaluation has been answered correctly.
     * @param int $ideval
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function checkans(Request $request, int $ideval) {
        $correctanswer = Evaluation::select('answer')
                            ->where('id', $ideval)
                            ->value('answer');
        if ($request->answer === $correctanswer) {return "true";}
        return "false";
    }

    
}
