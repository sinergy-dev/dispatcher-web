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
use QrCode;
use PDF;
use Storage;

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

    public function createLetterAndQR(){
    	$name_qr = 'job_qr_' . Carbon::now()->timestamp . '.svg';
    	$name_pdf = "job_pdf_" . Carbon::now()->timestamp . ".pdf";
    	$data = ["qr_file" => $name_qr];
    	QrCode::size(50)->generate('https://sinergy-dev.xyz',$name_qr);

    	$pdf = PDF::loadView('pdf.letter_of_assignment',compact('data'));
    	Storage::put("public/" . $name_pdf, $pdf->output());

    	$client = new \GuzzleHttp\Client([
			'verify' => false
		]);

		$url_qr = env('API_LINK_CUSTOM') . '/job/createJob/postQRRecive';
		$send_qr_image = $client->request('POST', $url_qr, [
		'multipart' => [
			[
				'name'     => 'qr_image',
				'contents' => fopen(base_path() . '/public/' . $name_qr, 'r'),
			]]
		]);

		$url_pdf = env('API_LINK_CUSTOM') . '/job/createJob/postPDFRecive';
		$send_pdf_file = $client->request('POST', $url_pdf, [
		'multipart' => [
			[
				'name'     => 'pdf_file',
				'contents' => fopen(base_path() . '/storage/app/public/' . $name_pdf, 'r'),
				
			]]
		]);

		return $pdf->stream($name_pdf);
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
    	// QrCode::size(100)->generate('https://sinergy-dev.xyz');
    	return view('job.test');
    }

    public function testQR(){
    	QrCode::generate('Make me into a QrCode!');
    }

    
}
