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
use Auth;
use Crypt;

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

    public function createLetterAndQR(Request $req){
    	$name_qr = 'job_qr_' . Carbon::now()->timestamp . '.svg';
    	$name_pdf = "job_pdf_" . Carbon::now()->timestamp . ".pdf";

    	$client = new \GuzzleHttp\Client([
			'verify' => false
		]);

    	$url_pdf_data = env('API_LINK_CUSTOM') . '/job/getJobForLoAPDF';
    	$pdf_data = $client->request('GET', $url_pdf_data,[
	    	'query' => ['id_job' => $req->id_job]
	    ]);

		$number = json_decode($pdf_data->getBody(),true)["last_job_letter"] + 1;
		$number = strlen((string)$number) < 2 ? "00" . $number : (strlen((string)$number) < 3 ? "0" . $number : (string)$number);
		$romawi = ["I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII"];
		$no_letter = "LoA/" . $number . "/" . $romawi[Carbon::now()->month - 1] . "/" . Carbon::now()->year;

		$source = json_decode($pdf_data->getBody(),true);

    	$data = [
    		"no_letter" => $no_letter,
    		"qr_file" => $name_qr,
    		"engineer_name" => $source['engineer']['name'],
    		"engineer_nik" => $source['engineer']['nik'],
    		"engineer_addres" => $source['engineer']['address'],
    		"engineer_place_of_birth" => $source['engineer']['pleace_of_birth'],
    		"engineer_date_of_birth" => Carbon::parse($source['engineer']['date_of_birth'])->format("j F Y"),
    		"engineer_photo" => $source['engineer']['photo_image_url'],
    		
    		"job_title" => $source['job']['job_name'],
    		"job_category" => $source['job']['category']['category_name'],
    		"job_location" => $source['job']['location']['long_location'],
    		"job_address" => $source['job']['job_location'],

    		"job_description" => explode("\n",$source['job']['job_description']),
    		"job_requirment" => explode("\n",$source['job']['job_requrment']),
    	
    		"job_customer" => $source['job']['customer']['customer_name'],
    		"job_customer_address" => $source['job']['customer']['address'],
    		"job_pic" => $source['job']['pic']['pic_name'],
    		"job_pic_phone" => $source['job']['pic']['pic_phone'],
    		"job_pic_email" => $source['job']['pic']['pic_mail'],

    		"moderator" => Auth::user()->name
    	];

    	$parameter = Crypt::encrypt([
    		'id_job' => $req->id_job
    	]);
    	$url_source = "https://172.16.1.200:8080/loa/" . $parameter;
    	$url_qr = app('bitly')->getUrl($url_source);
    	QrCode::size(50)->generate($url_qr,$name_qr);

    	// return json_decode($pdf_data->getBody(),true);
    	// return json_decode($pdf_data->getBody(),true)['job'];

    	// QrCode::size(50)->generate('https://sinergy-dev.xyz',$name_qr);

    	$pdf = PDF::loadView('pdf.letter_of_assignment',compact('data'));
    	Storage::put("public/" . $name_pdf, $pdf->output());

		$url_qr = env('API_LINK_CUSTOM') . '/job/createJob/postQRRecive';
		$send_qr_image = $client->request('POST', $url_qr, [
		'multipart' => [
			[
				'name'     => 'qr_image',
				'contents' => fopen(base_path() . '/public/' . $name_qr, 'r'),
			],
            [
                'name'     => 'id_job',
                'contents' => $req->id_job
            ]]
		]);

		$url_pdf = env('API_LINK_CUSTOM') . '/job/createJob/postPDFRecive';
		$send_pdf_file = $client->request('POST', $url_pdf, [
		'multipart' => [
			[
				'name'     => 'pdf_file',
				'contents' => fopen(base_path() . '/storage/app/public/' . $name_pdf, 'r'),
				
			],
            [
                'name'     => 'id_job',
                'contents' => $req->id_job
            ]]
		]);
		$options = [
			'form_params' => [
				"no_letter"     => $no_letter,
				"qr_file"     => $name_qr,
				"pdf_file"     => $name_pdf,
				"created_by"     => "6"
			]
		]; 
		
		$url_letter = env('API_LINK_CUSTOM') . '/job/createJob/postLetter';
		$send_letter = $client->request('POST', $url_letter, $options);

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

    public function testLiveNotificationView(Request $req){
    	// QrCode::size(100)->generate('https://sinergy-dev.xyz');
        return view('job.test');

    }

    public function testQR(){
    	QrCode::generate('Make me into a QrCode!');
    }

    public function showLoAfromQR($parameter){
    	echo Crypt::encrypt($parameter);
    }

    
}
