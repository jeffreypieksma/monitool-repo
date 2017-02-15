<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/*
use App\Options;
use App\Project;
use App\Service;
*/
use App\User;
use Auth;
use Hash;
use DB;

class AccountController extends Controller
{
	//Alle opties
	public function index() {
		$user_id = Auth::user()->id;
		$user = Auth::user($user_id);
		
		return view('account-settings', compact('user'));
	}
	

	public function updateAccount(Request $request) {
		$id = Auth::user()->id;
		$user = User::find($id);
		if ($request->password_new) {
			if (Hash::check($request->password, $user->password))
			{
				if ($request->password_new == $request->password_new_confirm) {
					$user->password = Hash::make($request->password_new);
					$user->name = $request->name;
			    	$user->save();
			    	$request->session()->flash('alert-success', 'Successfully updated name and password!');
			    	return redirect('/account-settings');
				}
				else{
					$request->session()->flash('alert-danger', 'Passwords do not match.');
			    	return redirect('/account-settings');
				}
			}
			else{
				$request->session()->flash('alert-danger', 'Password does not match with our database.');
				return redirect('/account-settings');
			}   
		}
		else{
			$user->name = $request->name;
			$user->save();
			$request->session()->flash('alert-success', 'Successfully updated name!');
			return redirect('/account-settings');
		}
	}

}
