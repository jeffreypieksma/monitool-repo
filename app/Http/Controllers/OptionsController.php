<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Options;
use App\Project;
use App\Service;
use Auth;
use DB; 

class OptionsController extends Controller
{
	//Alle opties
	public function index() {
		$user_id = Auth::user()->id;

		$user = Auth::user($user_id);	

		$project = Project::find($user_id);	


		$services = DB::table('projects')
            ->join('services', 'projects.id', '=', 'projects.user_id')
            ->select(
            	'services.id',
            	'services.name',
            	'services.acces_token'
            )->get();

       
		return view('options', compact('user', 'project', 'services'));
	}

	public function delete(Request $request, $id) {
	    $product = Product::find($id);
	    
	    $product->delete();
	    return redirect('/products');
	}
	
	//Updaten
	public function updateProject(Request $request, $id) {
	    $project = Project::find($id);
	    $this->validate($request,
	    [
	        'name' => 'required|max:255',
	        'dateFormat' => 'required'
	    ]);
	    
	    $project->name = $request->name;
	    $project->dateFormat = $request->dateFormat;
	    $project->save();
	    return redirect('/options');
	}


}
