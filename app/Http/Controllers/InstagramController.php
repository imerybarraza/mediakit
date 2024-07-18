<?php

// app/Http/Controllers/InstagramController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class InstagramController extends Controller
{
    public function redirectToInstagramProvider()
    {
        $query = http_build_query([
            'client_id' => env('INSTAGRAM_CLIENT_ID'),
            'redirect_uri' => env('INSTAGRAM_REDIRECT_URI'),
            'response_type' => 'code',
            'scope' => 'user_profile,user_media',
        ]);

        return redirect('https://api.instagram.com/oauth/authorize?' . $query);
    }

    public function handleProviderCallback(Request $request)
    {
        $http = new Client;

        // Exchange code for access token
        $response = $http->post('https://api.instagram.com/oauth/access_token', [
            'form_params' => [
                'client_id' => env('INSTAGRAM_CLIENT_ID'),
                'client_secret' => env('INSTAGRAM_CLIENT_SECRET'),
                'code' => $request->code,
                'grant_type' => 'authorization_code',
                'redirect_uri' => env('INSTAGRAM_REDIRECT_URI'),
             
            ],
        ]);

        $data = json_decode((string) $response->getBody(), true);
        $accessToken = $data['access_token'];

        // Fetch user data
        $userResponse = $http->get('https://graph.instagram.com/me', [
            'query' => [
                'fields' => 'id,username,account_type,media_count,media',
                'access_token' => $accessToken,
            ],
        ]);

        $user = json_decode((string) $userResponse->getBody(), true);

      
        return view('dashboard', compact('user'));
    }
}
