<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class MapsController extends Controller
{

 protected $client;


/**
 * Create a new controller instance.
 *
 * @return void
 */

 public function __construct(Client $client1){
    $this->client = $client1;

}

/**
 * Show the application dashboard.
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{
    return view('map');
}

}
