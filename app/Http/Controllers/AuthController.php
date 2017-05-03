<?php

namespace App\Http\Controllers;
use Storage;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
Use App\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

      public function mylogin(Request $request) #va todo...en ésta variable.
    {
      
        
        $client = new Client([
    // Base URI is used with relative requests
        'base_uri' => 'https://apimaricells.herokuapp.com/'
    // You can set any number of default request options.

    ]);

    $response = $client->request('post', config('global.url')."login", [
        'form_params' => [             #Se obtienen los datos.
        'email' => $request->email,
        'password' => $request->password
       ]
    ]);
      
       #Si pasa guarsa un usuario temporal para guardarlo en laravel. Crea un usuario temporal.
       if ($response->getReasonPhrase()=='OK') {
        $user=new User();
        $user->name=$response->getHeaders()['name'][0];
        $user->email=$request->email;
        $user->password=$password = bcrypt($request->password);
        $user->role=$response->getHeaders()['role'][0];
        $user->token=$response->getHeaders()['token'][0];
        $user->id_user=$response->getHeaders()['id'][0];
        $user->save(); #usuario temporal guardado.
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication passed...
            return redirect()->intended('/home'); #Va cuando está logeado.
        }
          
       }
       return back()->withInput();     #Sino le devuelve los datos con contraseña borrada.
    }
      /**
       * Devuelve la vista de login.
       */
    public function vista()
    {

     return view("auth.login");

    }

    /**
     * 
     */
    public function logout()
    {

      $currentuser = User::find(Auth::user()->id);
      Auth::logout();
      $currentuser->delete();
      return redirect('/login');
    }

}
