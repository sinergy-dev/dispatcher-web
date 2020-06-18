<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Crypt;
use GuzzleHttp\Client;
use Carbon\Carbon;
class GuestController extends Controller
{
    //
    public function showLeaterOfAssignment($parameter){
    	;
    	$client = new Client([
			'verify' => false
		]);
    	$respond = $client->request('GET', env('API_LINK_CUSTOM') . '/job/getJobForPDF',[
	    	// 'query' => ['id_job' => Crypt::decrypt($parameter)["id_job"]]
	    	'query' => ['id_job' => 50]
	    ]);
		
	    $respond = json_decode($respond->getBody(),true);
	    $data = [
	    	// "customer" => $respond
	    	"customer" => $respond["job"]["customer"]["customer_name"],
	    	"job_name" => $respond["job"]["job_name"],
	    	"job_description" => preg_replace("/\n/","<br>", $respond["job"]["job_description"]),
	    	"job_requrment" => preg_replace("/\n/","<br>", $respond["job"]["job_requrment"]),
	    	"job_location" => $respond["job"]["job_location"],
	    	"job_long_location" => $respond["job"]["location"]["long_location"],
	    	"job_level" => $respond["job"]["level"]["level_name"] . " - " . $respond["job"]["level"]["level_description"],
	    	"job_range" => Carbon::parse($respond["job"]["date_start"])->format('j F') . " - " . Carbon::parse($respond["job"]["date_end"])->format('j F Y'),

	    	"engineer_name" => $respond['engineer']['name'],
    		"engineer_nik" => $respond['engineer']['nik'],
    		"engineer_addres" => $respond['engineer']['address'],
    		"engineer_place_of_birth" => $respond['engineer']['pleace_of_birth'],
    		"engineer_date_of_birth" => Carbon::parse($respond['engineer']['date_of_birth'])->format("j F Y"),
    		"engineer_photo" => $respond['engineer']['photo_image_url'],
    		"engineer_phone" => $respond['engineer']['phone'],
    		"engineer_email" => $respond['engineer']['email'],
	    	"engineer_level" => $respond["engineer"]["level_engineer"]["level_name"] . " - " . $respond["engineer"]["level_engineer"]["level_description"],
	    ];

	    // return $data;
	    // return $respond;
		return view('guest.job_detail',compact('data'));
    }
}
