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
    
      
    $r=$this->client->request('GET', config('global.url').'vouchers', [
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
     $response = $this->client->request('POST', config('global.url').'vouchers', [
    'form_params' => [
        'articulo' => $request->articulo,
        'marca' => $request->marca,
        'modelo' => $request->modelo,
        'serie' => $request->serie,
        'color' => $request->color,
        'adelanto' => $request->adelanto,
        'accesorio' => $request->accesorio,
        'estado' => $request->estado,
        'reporte' => $request->reporte,
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
      
    $r=$client->request('GET', config('global.url').'vouchers/'.$id, [
            'headers' => [
            'token'  => Auth::user()->token
            ]]);
         $body =$r->getBody();
        $data = json_decode($body);
      
        $comments=$data->comments;
        $voucher=$data->voucher;
        return view('voucher.show',compact('comments','voucher'));
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function edit($id)
{
      
    $r=$this->client->request('GET', config('global.url').'vouchers/'.$id, [
            'headers' => [
            'token'  => Auth::user()->token
            ]]);
        $body =$r->getBody();
        $data = json_decode($body);
        $voucher=$data->voucher;
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
    $response = $this->client->request('PUT', config('global.url').'vouchers/'.$id, [
    'form_params' => [
        'articulo' => $request->articulo,
        'marca' => $request->marca,
        'modelo' => $request->modelo,
        'serie' => $request->serie,
        'color' => $request->color,
        'adelanto' => $request->adelanto,
        'accesorio' => $request->accesorio,
        'estado' => $request->estado,
        'reporte' => $request->reporte,
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

$this->client->request('DELETE', config('global.url').'vouchers/'.$id, [
            'headers' => [
            'token'  => Auth::user()->token
            ]]);
return redirect('/vouchers');
}


}
