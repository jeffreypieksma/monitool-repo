<?php

namespace App\Http\Controllers;

use Auth;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use SammyK\FacebookQueryBuilder\FQB;

use App\Http\Controllers\FacebookController;

class DashboardController extends Controller
{
    public function __construct(){
        //de class ophalen van de bijbehorende socialmedia als die is aangemaakt
        if ( true /* user has facebook */ ) {
            $this->FacebookController = new FacebookController;
        }
    }

    public function index(){
    	$id = Auth::id();
        if ($id) {
            $project = DB::table('projects')->where('user_id', $id)->first();
            if (!$project) {
                return redirect('create-project');
            }
            else{
                $data = $this->FacebookController->dashboard();
                $data['data']['project'] = $project;
                return view('dashboard', $data);
            }
        }
    	else{
            return view('auth.login');
        }
    }

    public function options(){
    	return view('options');
    }
    public function help(){
        return view('help');
    }
}
