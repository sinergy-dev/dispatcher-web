<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;

// use Kreait\Firebase;
// use Kreait\Firebase\Factory;
// use Kreait\Firebase\ServiceAccount;
// use Kreait\Firebase\Database;

use Kreait\Firebase\Firestore;
use Kreait\Firebase\Database;

class JobController extends Controller
{
	public function __construct(Database $database) {
		$this->middleware('auth');
		$this->database = $database;
	}


    //
    public function index(){
		return view('job.index');
    }

    public function detail(){
    	return view('job.detail');
    }

    public function testLiveNotification(){
    	$reference = $this->database->getReference('notification/web-notification');
    	$snapshot = $reference->orderByKey()->getSnapshot();
    	$snapshot->getValue();

    	$this->database->getReference('notification/web-notification/' . strval(sizeof($snapshot->getValue())) )
			->set([
				'to' => 'moderator@sinergy.co.id',
				'from' => 'agastya@sinergy.co.id',
				'title' => 'Job Update',
				'message' => 'Job Has been update from day 1',
				'status' => 'unread',
				'date_time' => Carbon::now()->timestamp,
				'showed' => false,
			]);

    	// to: data.to,
     //    from: data.from,
     //    title: data.title,
     //    message: data.message,
     //    status: "read",
     //    date_time : data.date_time,
     //    showed : true


    	// return $reference->getSnapshot();
    	// $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/eod-dev-key.json');
    	// $factory = (new Factory)->withServiceAccount(__DIR__.'/eod-dev-key.json');
		// $firebase = (new Factory)
		// 	// ->withServiceAccount($serviceAccount)
		// 	->withServiceAccount(__DIR__.'/eod-dev-key.json')
		// 	->withDatabaseUri('https://eod-dev-e021a.firebaseio.com')
		// 	->createDatabase();

		echo "<pre>";
		// print_r( $reference->getValue());
		print_r( strval(sizeof($snapshot->getValue())));
		print_r( gettype(""));

		// print_r( sizeof($snapshot->getValue()) - 1);
		echo "</pre>";

		// return $firebase;

		// $database = $firebase->getDatabase();
		// $reference = $database->getReference('notification');
		// $snapshot = $reference->getSnapshot();

		// return $snapshot;


    }

    public function testLiveNotificationView(){
    	return view('job.test');
    }
}
