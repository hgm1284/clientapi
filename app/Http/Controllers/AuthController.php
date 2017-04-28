<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class AuthController extends Controller
{
      public function mylogin(Request $request)
    {
        
        
        $client = new Client();
        $res = $client->request('POST', 'https://apimaricells.herokuapp.com/login', [
            'form_params' => [
                'email' => $request->email ,
                'password' => $request->password ,
            ]
        ]);
        
        if ($res->getStatusCode()==422) {
        	    return redirect('/login');
        
        }else {
        return redirect('/')->with('status', 'Profile updated!');

        }
       
    }

    public function vista()
    {

     return view("auth.login");

    }
}
