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

        $data['data']['insights']   = $this->insights();

        $data['data']['likes']      = $this->page_likes();

        $data['data']['feed']       = $this->feed();

        return $data;

    }



    public function feed(){

        $request = $this->fqb->node("$this->node/feed")

                    ->fields("name,message,shares,comments.summary(true),likes.summary(true),created_time,picture,story,full_picture")

                    ->accessToken($this->access_token)

                    ->graphVersion('v2.8');

        $context    = stream_context_create(['http' => ['ignore_errors' => true]]);

        $response   = file_get_contents((string) $request, null, $context);

        $data       = json_decode($response, true);





        $output = array();

        foreach ($data['data'] as $key => $post) {

            //define

            $date = date('d-m-Y G:i:s', strtotime($post['created_time']));

            $picture = "";

            $message = "";

            $likes = "";

            $shares = "";

            $comments = "";



            if(isset($post['picture'])){

              $picture = $post['picture'];

            }



            if(isset($post['message'])){

              $message = $post['message'];

            }



            if(isset($post['likes'])){

              $likes = $post['likes']['summary']['total_count'];

            }



            if(isset($post['shares'])){

              $shares = $post['shares']['count'];

            }



            if(isset($post['comments'])){

              $comments = $post['comments']['summary']['total_count'];

            }



            $output['data'][$key] = array(

                    'date'  => $date,

                    'picture' => $picture,

                    'message' => $message,

                    'id' => $post['id'],

                    'likes' => $likes, 'shares' => $shares, 'comments' => $comments);

            }



        return $output;

    }



    public function post_dates(){

        $request = $this->fqb->node("$this->node/feed")

                    ->fields("created_time")

                    ->accessToken($this->access_token)

                    ->graphVersion('v2.8');

        $context    = stream_context_create(['http' => ['ignore_errors' => true]]);

        $response   = file_get_contents((string) $request, null, $context);

        $data       = json_decode($response, true);

        $formatedData = array();

        foreach ($data['data'] as $key => $value) {

            $newDatFormat = strtotime($value["created_time"]);

            $formatedData[] = array( "created_time" => date('D M d Y h:i:s OT (e)', $newDatFormat), "id" => $value["id"] );

        }

        return $formatedData;

    }



    public function page_likes(){

        $request = $this->fqb->node("$this->node/insights/page_fans_by_like_source")

                       ->accessToken($this->access_token)

                       ->graphVersion('v2.8')

                       ->modifiers(array('since' => '2016-10-24', 'period' => 'day'));

        $context     = stream_context_create(['http' => ['ignore_errors' => true]]);

        $response     = file_get_contents((string) $request, null, $context);

        $data         = json_decode($response, true);

        return $this->likesToJS($data['data']);

        //return $data['data'];

    }



    public function insights(){

        $request = $this->fqb->node("$this->node/insights/page_impressions")

                    ->accessToken($this->access_token)

                    ->graphVersion('v2.8')

                    ->modifiers(array('since' => '2016-10-24', 'period' => 'day'));

        $context    = stream_context_create(['http' => ['ignore_errors' => true]]);

        $response   = file_get_contents((string) $request, null, $context);

        $data       = json_decode($response, true);

        return $this->insightsToJS($data['data']);



        //return $data['data'];



    }



    public function insightsToJS($data)

    {

        //de array die opgestuurd wordt

        $fbDataArray = [];

        //de datums van de geplaatste posts

        $posts = $this->post_dates();

        //voor elke dag

        foreach($data[0]['values'] as $value)

        {

            $fbdate = strtotime($value["end_time"]);            //naar date format

            $date = date('D M d Y h:i:s OT (e)', $fbdate);      //naar juiste configuratie voor de line chart

            $postId = false;                                    //de check

            foreach ($posts as $postDate) {                     //for elke post die geplaatst is

                $theDate = substr($postDate["created_time"], 0, 15);            

                if ( date('D M d Y', $fbdate) == $theDate ) {   //is een datum gelijk aan de post datum

                    $postId = $postDate["id"];                  //check is goed

                }

            }

            if($postId != false){//is de check goed?

                $fbDataArray[] = array('date' => $date, 'visits' => $value["value"], "bullet" => "round", "description" => $postId);//geef bullet mee

            }else{//anders

                $fbDataArray[] = array('date' => $date, 'visits' => $value["value"]);//alleen de datum en het aantal bezoekers

            }

        }

        return json_encode($fbDataArray);

    }



    public function likesToJS($data){

        $fbDataArray = [];

        foreach($data[0]['values'] as $value){

            $fbdate = strtotime($value["end_time"]);

            $date = date('D M d Y h:i:s OT (e)', $fbdate);

            if(empty($value["value"])){

                $value["value"]["page_timeline"] = '0';

            }

            elseif(empty($value["value"]["page_timeline"])) {

                $value["value"]["page_timeline"] = 0 + $value["value"]["page_profile"];

            }

            $fbDataArray[] = array('date' => $date, 'visits' => $value["value"]["page_timeline"]);

        }

        return json_encode($fbDataArray);

    }

}