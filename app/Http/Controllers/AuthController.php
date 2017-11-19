<?php

namespace App\Http\Controllers;
use Storage;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
Use App\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

  public function mylogin(Request $request){

    $client = new Client([
      // Base URI is used with relative requests
      'base_uri' => 'https://sheltered-island-32705.herokuapp.com/'
      // You can set any number of default request options.
    ]);

    $response = $client->request('post', config('global.url')."sessions", [
      'form_params' => [             #Se obtienen los datos.
      'email' => $request->email,
      'password' => $request->password
    ]
  ]);

  #Si pasa guarda un usuario temporal para guardarlo en laravel. Crea un usuario temporal.
  if ($response->getReasonPhrase()=='OK') {
    $user=new User();
    $user->name=$response->getHeaders()['Name'][0];
    $user->email=$request->email;
    $user->password=$password = bcrypt($request->password);
    $user->role=$response->getHeaders()['Role'][0];
    $user->token=$response->getHeaders()['Token'][0];
    $user->id_user=$response->getHeaders()['Id'][0];
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
