<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;

use SammyK\FacebookQueryBuilder\FQB;

class FacebookController extends Controller
{
	public function __construct(){
		$this->fqb = new FQB;
		$this->access_token = 'EAACryEAoP3cBAHZBxVqz1a4CdDF1OzcrBLkzKK37CaNp9Fe8WDqienuG8hu6b7mCgJ0E4Xj3ZAzFVh6Qfwbni09jzZAj2L8u4S8nnOtjEtZAaPXVfy1CNnB06ASy6WlPZCV7UyJHhdqGhGLJRfKGMurY2gjvwqjMZD';
		$this->node = '1775886599336178';
	}

	public function dashboard(){
		$data = array();

		//insights ophalen
		$data['data']['insights']	= $this->insights();

		//fb insights omzetten naar js object
		$fbDataArray = [];
		foreach($data['data']['insights']['data'][0]['values'] as $value){
			 $fbdate = strtotime($value["end_time"]);
			 $date = date('D M d Y h:i:s OT (e)', $fbdate); //juiste date format 
			 $fbDataArray[] = array('date' => $date, 'visits' => $value["value"]);
		}

		//js object meegeven
		$data['data']['insights'] 	= json_encode($fbDataArray);
		//feed ophalen
		$data['data']['feed']		= $this->feed();

		return $data;
	}

	public function feed(){
	    $request = $this->fqb->node("$this->node/feed")
	    			->fields("name,message,shares,comments.summary(true),likes.summary(true),created_time,picture,story,full_picture")
	               	->accessToken($this->access_token)
	               	->graphVersion('v2.8');
		$context 	= stream_context_create(['http' => ['ignore_errors' => true]]);
		$response 	= file_get_contents((string) $request, null, $context);
		$data 		= json_decode($response, true);

		return $data;
	}

	public function insights(){
	    $request = $this->fqb->node("$this->node/insights/page_impressions")
	               	->accessToken($this->access_token)
	               	->graphVersion('v2.8')
	               	->modifiers(array('since' => '2016-10-24', 'period' => 'day'));
		$context 	= stream_context_create(['http' => ['ignore_errors' => true]]);
		$response 	= file_get_contents((string) $request, null, $context);
		$data 		= json_decode($response, true);

		return $data;
	}

	public function likes(){
		//get data
	    $request = $this->fqb->node("$this->node/feed")
	    			->fields("likes.summary(true)")
	               	->accessToken($this->access_token)
	               	->graphVersion('v2.8');
		$context 	= stream_context_create(['http' => ['ignore_errors' => true]]);
		$response 	= file_get_contents((string) $request, null, $context);
		$data 		= json_decode($response, true);

        //send data
		return $data;
	}

}