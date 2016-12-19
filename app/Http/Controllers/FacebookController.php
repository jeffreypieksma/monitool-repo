<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use SammyK\FacebookQueryBuilder\FQB;
use Facebook;

class FacebookController extends Controller
{
	public function __construct(){
		// //fb libary ophalen
		// $fb = new Facebook\Facebook([
		//   'app_id' => '188876558188407',
		//   'app_secret' => '0a239d9768b14c9a5868fbc5c726de80',
		//   'default_graph_version' => 'v2.8',
		// ]);

		// session_start();

		// $helper = $fb->getRedirectLoginHelper();
		// $permissions = ['user_likes', 'manage_pages']; // optional
		// $loginUrl = $helper->getLoginUrl('http://localhost/login-callback.php', $permissions);

		// echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';

		// //dd();

		$this->fqb = new FQB;
		$this->access_token = 'EAACryEAoP3cBAHZBxVqz1a4CdDF1OzcrBLkzKK37CaNp9Fe8WDqienuG8hu6b7mCgJ0E4Xj3ZAzFVh6Qfwbni09jzZAj2L8u4S8nnOtjEtZAaPXVfy1CNnB06ASy6WlPZCV7UyJHhdqGhGLJRfKGMurY2gjvwqjMZD';
		$this->node = '1775886599336178';
	}

	public function dashboard(){
		//insights ophalen
		$data['data']['insights'] 	= $this->insights();
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
		return 		$data['data'];
	}

	public function insights(){
	    $request = $this->fqb->node("$this->node/insights/page_impressions")
	               	->accessToken($this->access_token)
	               	->graphVersion('v2.8')
	               	->modifiers(array('since' => '2016-10-24', 'period' => 'day'));
		$context 	= stream_context_create(['http' => ['ignore_errors' => true]]);
		$response 	= file_get_contents((string) $request, null, $context);
		$data 		= json_decode($response, true);
		return 		$this->dataToJS($data['data']);
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
		// return $this->dataToJS($data['data']);
		return 		$data['data'];
	}

	//set the received data to javascript
	// @data is the php received
	public function dataToJS($data){
        $fbDataArray = array();
        foreach($data[0]['values'] as $value)
        {
            $fbdate = strtotime($value["end_time"]);
            $date = date('D M d Y h:i:s OT (e)', $fbdate);
       		$fbDataArray[] = array('date' => $date, 'visits' => $value["value"]);
        }
        return json_encode($fbDataArray);
    }

}