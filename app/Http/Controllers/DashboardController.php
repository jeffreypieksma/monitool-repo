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
    public function __construct(){
        $this->fqb = new FQB;
        $this->access_token = 'EAACryEAoP3cBAHZBxVqz1a4CdDF1OzcrBLkzKK37CaNp9Fe8WDqienuG8hu6b7mCgJ0E4Xj3ZAzFVh6Qfwbni09jzZAj2L8u4S8nnOtjEtZAaPXVfy1CNnB06ASy6WlPZCV7UyJHhdqGhGLJRfKGMurY2gjvwqjMZD';
        $this->node = '1775886599336178';
    }

    public function index(){
    	$id = Auth::id();
        if ($id) {
            $project = DB::table('projects')->where('user_id', $id)->first();
            if (!$project) {
                return redirect('create-project');
            }
            else{
                $data = $this->insights();
                return view('dashboard', $data);
            }
        }
    	else{
            return view('auth.login');
        }
    }

    public function insights(){
        $request = $this->fqb->node("$this->node/insights/page_impressions")
                    ->accessToken($this->access_token)
                    ->graphVersion('v2.8')
                    ->modifiers(array('since' => '2016-10-24', 'period' => 'day'));
        $context    = stream_context_create(['http' => ['ignore_errors' => true]]);
        $response   = file_get_contents((string) $request, null, $context);
        $data       = json_decode($response, true);

        return $data;
    }

    public function options(){
    	return view('options');
    }
}
