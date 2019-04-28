<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Note;

class NoteController extends Controller
{
    /**
     * Display a listing of the notes of the connected user.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {
    	$user = Auth::User();
    	$notes = $user->notes()->get()->toJson();
    	return $notes;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $user = Auth::User();
        $note = $user->notes()->findOrFail($id)->toJson();
        return $note;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $user = Auth::User();
        $id = Note::insertGetId(
				    ['note' => $request->note, 'user_id' => $user->id]
				);
        return $id;
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function suppr($id)
    {   
        $user = Auth::User();
        $note = $user->notes()->findOrFail($id);
        $note->delete();
        return "deleted";
    }
}
