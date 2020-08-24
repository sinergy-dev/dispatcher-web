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


class CategoryController extends Controller
{
    //
    public function __construct(Database $database) {
		$this->middleware('auth');
		$this->database = $database;
	}

	public function index(){
		return view('category.index');
    }
}
