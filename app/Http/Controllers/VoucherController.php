<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class VoucherController extends Controller
{


/**
* Create a new controller instance.
*
* @return void
*/
protected $client;

public function __construct(Client $client1){
    $this->client = $client1;

}
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{

$r=$this->client->request('GET', config('global.url').'bills', [
        'headers' => [
        'token'  => Auth::user()->token
        ]]);
    $body =$r->getBody();
    $data = json_decode($body);
    return view('voucher.index',compact('data'));
}

/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
 $r=$this->client->request('GET', config('global.url').'users', [
        'headers' => [
        'token'  => Auth::user()->token
        ]]);
  $body =$r->getBody();
    $users = json_decode($body);
return view('voucher.create',compact('users'));
}

/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
 $response = $this->client->request('POST', config('global.url').'bills', [
'form_params' => [
    'brand' => $request->brand,
    'model' => $request->model,
    'serie' => $request->serie,
    'color' => $request->color,
    'money' => $request->money,
    'accesories' => $request->accesories,
    'status' => $request->status,
    'report' => $request->report,
    'user_id' => $request->user_id
   ],
   'headers' => [
        'token'  => Auth::user()->token
        ]
]);
return redirect('/vouchers');
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

$r=$client->request('GET', config('global.url').'bills/'.$id, [
        'headers' => [
        'token'  => Auth::user()->token
        ]]);
     $body =$r->getBody();
    $data = json_decode($body);
    $comments=$data->comments;
    $voucher=$data->bill;
    $username=$data->user;
    
    return view('voucher.show',compact('comments','voucher','username'));
}

/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{

$r=$this->client->request('GET', config('global.url').'bills/'.$id, [
        'headers' => [
        'token'  => Auth::user()->token
        ]]);
    $body =$r->getBody();
    $data = json_decode($body);
    $voucher=$data->bill;
    return view('voucher.edit',compact('voucher'));
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
$response = $this->client->request('PUT', config('global.url').'bills/'.$id, [
'form_params' => [
    'brand' => $request->brand,
    'model' => $request->model,
    'serie' => $request->serie,
    'color' => $request->color,
    'money' => $request->money,
    'accesories' => $request->accesories,
    'status' => $request->status,
    'report' => $request->report,
    'user_id' => $request->user_id
   ],
   'headers' => [
        'token'  => Auth::user()->token
        ]
]);
return redirect('/vouchers');

}

/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{

$this->client->request('DELETE', config('global.url').'bills/'.$id, [
        'headers' => [
        'token'  => Auth::user()->token
        ]]);
return redirect('/vouchers');
}


}
