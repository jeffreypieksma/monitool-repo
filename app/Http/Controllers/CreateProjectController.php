<?php

namespace App\Http\Controllers;

use Auth;
use App\Project;
use App\Service;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CreateProjectController extends Controller
{
    public function index(){
    	$id = Auth::id();
    	if ($id > 0) {
    		//$project = DB::table('projects')->where('user_id', $id)->first();
            $project = Project::where('user_id', $id)->first();
            if (!$project) {
	    		return view('create-project');
	    	}
	    	else{
	    		return redirect('dashboard');
	    	}
            // return view('create-project');
    	}
    	else{
    		return redirect('home');
    	}	
    }

    public function store(Request $request){

        $project = new Project;
        $project->name = $request->name;
        $project->dateFormat = $request->dateFormat;
        $project->user_id = Auth::id();
        $project->save();

        $id = Auth::id();
        $user = User::find($id);
        $user->project_id = $project->id;
        $user->save();

        $service_fb = new Service;
        $service_fb->name = 'Facebook';
        $service_fb->acces_token = $request->fb_access_token;
        $service_fb->project_id = $project->id;
        $service_fb->secret_code = 'Test';
        $service_fb->app_id = 'Test2';
        $service_fb->save();
        
        $service_yt = new Service;
        $service_yt->name = 'Youtube';
        $service_yt->acces_token = $request->yt_access_token;
        $service_yt->project_id = $project->id;
        $service_yt->secret_code = 'Test';
        $service_yt->app_id = 'Test2';
        $service_yt->save();
        
	    return redirect('/dashboard');
    }
}
