<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use Illuminate\Support\Facades\Auth;
use Toastr;
use Validator;
use View;

class UserController extends Controller
{

    /*
     * go to this middleware first
     */
    public function __construct() {
        $this->middleware('admin');
    }

	/*
     * then do this functions
     */
    public function index () {
        $users = User::all();
    	return view('user.index', compact('users'));
    }

    public function create () {
        return View::make('user.create');
    }

    public function store (Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|max:255|confirmed',
            ]);

        if ($validator->fails()) {
            // Toastr
            $title = "Registration Failed!";
            $message = "Please make sure to fill all required fields.";
            $options = [
                'progressBar' => false,
                'positionClass' => 'toast-bottom-right',
                'timeOut' => 5000,
            ];
            Toastr::error($message, $title, $options);
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = New User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();

        // Toastr
        $title = "Registration Successful!";
        $message = "User with " . $request->email . " has been added to the list of users.";
        $options = [
            'progressBar' => false,
            'positionClass' => 'toast-bottom-right',
            'timeOut' => 5000,
        ];
        Toastr::success($message, $title, $options);
        return redirect()->guest('users');
    }

    public function edit ($id, Request $request) {
        $user = User::find($id);
        return View::make('user.edit', compact('user'));
    }

    public function update ($id, Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|max:255',
            ]);

        if ($validator->fails()) {
            // Toastr
            $title = "Update Failed!";
            $message = "Please make sure to fill all required fields.";
            $options = [
                'progressBar' => false,
                'positionClass' => 'toast-bottom-right',
                'timeOut' => 5000,
            ];
            Toastr::error($message, $title, $options);
            return redirect()->back()
                ->withErrors($validator);
        }

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();

        // Toastr
        $title = "Update Successful!";
        $message = "User with email " . $request->email . ' successfully udpated.';
        $options = [
            'progressBar' => false,
            'positionClass' => 'toast-bottom-right',
            'timeOut' => 5000,
        ];
        Toastr::success($message, $title, $options);
        return redirect()->guest('users');
    }

    public function delete ($id) {
        $user = User::find($id);
        $user->delete();

        // Toastr
        $title = "Delete Successful!";
        $message = "User successfully deleted.";
        $options = [
            'progressBar' => false,
            'positionClass' => 'toast-bottom-right',
            'timeOut' => 5000,
        ];
        Toastr::success($message, $title, $options);
        return redirect()->back();
    }
}
