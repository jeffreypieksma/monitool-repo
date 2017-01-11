<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Options;
use App\Project;
use App\Service;
use App\User;
use Auth;
use Hash;
use DB;

class OptionsController extends Controller
{
	//Alle opties
	public function index() {
		$id = Auth::id();
		if ($id) {
			$user_id = Auth::user()->id;
			$user = Auth::user($user_id);
			$project = DB::table('projects')->where('user_id', $user_id)->first();
			$services = DB::table('services')->where('project_id', $project->id)->get();
			$project_date = strtotime($project->created_at);
			$selected1= '';
			$selected2= '';
			$selected3= '';
			switch ($project->dateFormat) {
			case '1':
			  $selected1 = "selected=selected";
			  $project_date = date('d/m/Y', $project_date);
			  break;
			case '2':
			  $selected2 = "selected=selected";
			  $project_date = date('m/d/Y', $project_date);
			  break;
			case '3':
			  $selected3 = "selected=selected";
			  $project_date = date('Y/m/d', $project_date);
			  break;
			default:
			  $selected1 = "selected=selected";
			  break;
			}
			return view('options', compact('user', 'project', 'services', 'selected1', 'selected2', 'selected3', 'project_date'));
		}
		else{
			return redirect('login');
		}
	}

	public function delete(Request $request) {
		$id = Auth::user()->id;
		$user = User::find($id);
		$project = Project::find($user->project_id);
   
	    $project->delete();
	    return redirect('/create-project');
	}
	
	//Updaten
	public function updateProject(Request $request) {
		$success = '';
		$id = Auth::user()->id;
		$user = User::find($id);
		$project = Project::find($user->project_id);
	    $this->validate($request,
	    [
	        'name' => 'required|max:255',
	        'dateFormat' => 'required'
	    ]);
	    $project->name = $request->name;
	    $project->dateFormat = $request->dateFormat;
	    $project->save();
	    $request->session()->flash('alert-success', 'Successfully updated project settings!');
	    return redirect('/options');
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
			    	return redirect('/options');
				}
				else{
					$request->session()->flash('alert-danger', 'Passwords do not match.');
			    	return redirect('/options');
				}
			}
			else{
				$request->session()->flash('alert-danger', 'Password does not match with our database.');
				return redirect('/options');
			}   
		}
		else{
			$user->name = $request->name;
			$user->save();
			$request->session()->flash('alert-success', 'Successfully updated name!');
			return redirect('/options');
		}
	}

	public function updateService(Request $request) {
		$success = '';
		$id = Auth::user()->id;
		$user = User::find($id);

	    $service_fb = Service::where('project_id', $user->project_id)
	    ->where('name', 'Facebook')
	    ->first();
        $service_fb->acces_token = $request->Facebook_token;
        $service_fb->save();

        $service_yt = Service::where('project_id', $user->project_id)
	    ->where('name', 'Youtube')
	    ->first();
        $service_yt->acces_token = $request->Youtube_token;
        $service_yt->save();
        $request->session()->flash('alert-success', 'Successfully updated access tokens!');
	    return redirect('/options');
        return redirect('/options');
	}
}
