<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

   protected $client;
   
    public function __construct(Client $client1){
        $this->client = $client1;
       
    }

    public function index()
    {
        
    }


     public function myregister (Request $request)
    {
        
    $response = $this->client->request('POST', config('global.url').'users', [
    'form_params' => [
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
        'password' => $request->password
        ],
        'headers' => [
        'token'  => Auth::user()->token
            ]
    ]);
    return redirect('/home');
   
    
    }

    public function vista()
    {

      $response=$this->client->request('GET', config('global.url').'users', [
            'headers' => [
            'token'  => Auth::user()->token
            ]]);
         $body =$response->getBody();
        $data = json_decode($body);
        return view('auth.register',compact('data'));

    }
}