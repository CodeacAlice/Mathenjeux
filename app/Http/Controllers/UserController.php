<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {
    	$users = User::select('id', 'username', 'email')->get()->toArray();
    	return response()->json($users);
    }

    /**
     * Display the selected user.
     * @param string $api_token
     * @return \Illuminate\Http\Response
     */

    public function show() {
    	$user = Auth::User();
    	return $user;
    }
}
