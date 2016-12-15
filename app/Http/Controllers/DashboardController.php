<?php

namespace App\Http\Controllers;

use Auth;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use SammyK\FacebookQueryBuilder\FQB;

class DashboardController extends Controller
{

    public function index(){
    	$id = Auth::id();
        if ($id) {
            $project = DB::table('projects')->where('user_id', $id)->first();
            if (!$project) {
                return redirect('create-project');
            }
            else{
                $chartData = app('App\Http\Controllers\FacebookController')->insights();
                return view('dashboard', compact('chartData', 'project'));
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
