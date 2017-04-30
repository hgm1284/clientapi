<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class AuthController extends Controller
{
      public function mylogin(Request $request)
    {
        
        $client = new Client([
    // Base URI is used with relative requests
    'base_uri' => 'https://apimaricells.herokuapp.com/'
    // You can set any number of default request options.

    ]);

    $response = $client->request('POST', 'http://localhost:3000/login', [
    'form_params' => [
        'email' => $request->email,
        'password' => $request->password
       ]
    ]);

       if ($response->getReasonPhrase()=='OK') {
          return redirect('/home');
       }
       return back()->withInput();
    }

    public function vista()
    {

     return view("auth.login");

    }
}
