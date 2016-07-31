<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use Illuminate\Support\Facades\Auth;
use Toastr;
use Validator;

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

    public function changePassword () {
        return view('user.changePassword');
    }

    public function updatePassword (Request $request) {
        $validator = Validator::make($request->all(), [
            'oldpassword' => 'required|max:255',
            'newpassword' => 'required|min:6|max:255|confirmed',
            ]);
        $validator->after(function($validator) use($request) {
            if (!\Hash::check($request->get('oldpassword'), \Auth::user()->password)) {
                $validator->errors()->add('oldpassword', 'Old password dont match in our database.');
            }
        });
        if ($validator->fails()) {
            // Toastr
            $title = "Oops!";
            $message = "Please make sure to fill all required fields.";
            $options = [
                'progressBar' => false,
                'positionClass' => 'toast-top-right',
                'timeOut' => 6000,
            ];
            Toastr::error($message, $title, $options);
            return redirect()->back()
                ->withErrors($validator);
        } else {
            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($request->newpassword);
            $user->save();

            return redirect()->guest('logout');
        }
    }
}
