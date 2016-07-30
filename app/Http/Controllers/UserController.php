<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class UserController extends Controller
{
	/*
	 * go to this middleware first
	 */
    public function __construct () {
    	$this->middleware('admin');
    }

    /*
     * then do this functions
     */
    public function index () {
    	$users = User::all();
    	return view('user.index', compact('users'));
    }
}
