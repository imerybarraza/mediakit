<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\SocialCount;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Log;  
class InstagramController extends Controller
{
    public function redirectToInstagramProvider()
    {
        $query = http_build_query([
            'client_id' => '1469426853657547',
            'redirect_uri' => 'https://mediakit.test/instagram/callback',
            'response_type' => 'code',
            'scope' => 'user_profile,user_media',
           
        ]);

        return redirect('https://api.instagram.com/oauth/authorize?' . $query);
    }

    public function handleProviderCallback(Request $request)
    {
        $http = new Client;

       
        $response = $http->post('https://api.instagram.com/oauth/access_token', [
            'form_params' => [
                'client_id' => '1469426853657547',
                'client_secret' => '8e943c105f998bdc2890759883cfd49e',
                'code' => $request->code,
                'grant_type' => 'authorization_code',
                'redirect_uri' => 'https://mediakit.test/instagram/callback',
             
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

        $userInstagram = json_decode((string) $userResponse->getBody(), true);

       // Obtener el usuario autenticado
       $user = Auth::user();

       if (!$user) {
           Log::error('Usuario no autenticado.');
           return response()->json(['error' => 'Usuario no autenticado.'], 401);
       }

       Log::info('Usuario autenticado instagramcontroller: ' . $user->iduser);
        // Guardar o actualizar el registro 
        $socialCount = SocialCount::updateOrCreate(
            [
                'user_id' => $user->iduser,
                'platform' => 'instagram'
            ],
            [
                'social_id' => $userInstagram['id'],
                'access_token' => $accessToken
            ]
        );
        return view('dashboard', compact('userInstagram'));
    }
}
