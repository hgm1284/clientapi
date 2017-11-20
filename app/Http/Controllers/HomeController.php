<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
        return view('home');
    }
    /**
     * show the details of the current user
     */
    public function chargeProfile()
    {

    $r=$this->client->request('GET', config('global.url').'users/'.Auth::user()->id_user, [
            'headers' => [
            'token'  => Auth::user()->token
            ]]);
         $body =$r->getBody();
         $data = json_decode($body);
        return view('user.show',compact('data'));
    }

}
