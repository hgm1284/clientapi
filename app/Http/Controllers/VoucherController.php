<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class VoucherController extends Controller
{
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{
    $client = new Client();
      
    $r=$client->request('GET', 'http://localhost:3000/vouchers', [
            'headers' => [
            'token'  => '2886b60f3d59469989155a734fbc371b'
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
    //
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
      
    $r=$client->request('GET', 'http://localhost:3000/vouchers/'.$id, [
            'headers' => [
            'token'  => '2886b60f3d59469989155a734fbc371b'
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
    //
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
    //
}

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    //
}
}
