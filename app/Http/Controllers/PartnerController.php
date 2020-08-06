<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

// use Kreait\Firebase;
// use Kreait\Firebase\Factory;
// use Kreait\Firebase\ServiceAccount;
// use Kreait\Firebase\Database;

use Kreait\Firebase\Firestore;
use Kreait\Firebase\Database;

class PartnerController extends Controller
{
	public function __construct(Database $database) {
		$this->middleware('auth');
		$this->database = $database;
	}

    //
    public function index(){
		return view('partner.index');
    }

    public function detail(){
    	return view('partner.detail');
    }

    // public function detail(){
    // 	return view('job.detail');
    // }

    public function testLiveNotification(){
    	$reference = $this->database->getReference('notification');
    	$snapshot = $reference->getSnapshot();
    	$snapshot->getValue();

    	// return $reference->getSnapshot();
    	// $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/eod-dev-key.json');
    	// $factory = (new Factory)->withServiceAccount(__DIR__.'/eod-dev-key.json');
		// $firebase = (new Factory)
		// 	// ->withServiceAccount($serviceAccount)
		// 	->withServiceAccount(__DIR__.'/eod-dev-key.json')
		// 	->withDatabaseUri('https://eod-dev-e021a.firebaseio.com')
		// 	->createDatabase();

		echo "<pre>";
		// print_r( $reference->getSnapshot());
		print_r( $snapshot->getValue('test'));
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