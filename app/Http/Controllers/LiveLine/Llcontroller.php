<?php

namespace App\Http\Controllers\LiveLine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class Llcontroller extends Controller
{
    function index ()
    {
        
        // $url = env('API_PELANGGAN_URL');
        // $token = env('API_PELANGGAN_TOKEN');
        
        // dd($url, $token);
        // $client = new Client();
        
        // try {
        //     $response = $client->request('GET', $url, [
        //         'query' => ['token' => $token]
        //     ]);
            
        //     $data = json_decode($response->getBody(), true);
        //     return response()->json($data);
        // } catch (\Exception $e) {
        //     return response()->json(['error' => $e->getMessage()], 500);
        // }

        return view('Liveline.pages.index');
    }
}

