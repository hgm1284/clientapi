<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

  protected $client;//client to connect api


 public function __construct(Client $client){
    $this->client = $client;
}
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{
      $response=$this->client->request('GET', config('global.url').'users', [
        'headers' => [
        'token'  => Auth::user()->token
        ]]);
     $body =$response->getBody();
    $data = json_decode($body);
    return view('user.index',compact('data'));
}

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
public function create()
{
    //
}

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request)
{
    $response = $this->client->request('POST', config('global.url').'users', [
    'form_params' => [
    'name' => $request->name,
    'email' => $request->email,
    'password' => $request->password,
    'user_id' => $request->user_id
   ],
   'headers' => [
        'token'  => Auth::user()->token
        ]
]);
return redirect('/users');
 }

/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function show($id)
{
    $client = new Client();

$response=$client->request('GET', config('global.url').'users/'.$id, [
        'headers' => [
        'token'  => Auth::user()->token
        ]]);
     $body =$response->getBody();
    $data = json_decode($body);

    return view('user.show',compact('data'));
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function edit($id)
{
    $response=$this->client->request('GET', config('global.url').'users/'.$id, [
        'headers' => [
        'token'  => Auth::user()->token
        ]]);
    $body =$response->getBody();
    $data = json_decode($body);
    return view('user.edit',compact('data'));

}

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, $id)
{
     $response = $this->client->request('PUT', config('global.url').'users/'.$id, [
'form_params' => [
    'name' => $request->name,
    'email' => $request->email,
    'password' => $request->password,
    'user_id' => $request->user_id
   ],
   'headers' => [
        'token'  => Auth::user()->token
        ]
]);
return redirect('/users');
}

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    $this->client->request('DELETE', config('global.url').'users/'.$id, [
        'headers' => [
        'token'  => Auth::user()->token
        ]]);
return redirect('/users');
}
}
