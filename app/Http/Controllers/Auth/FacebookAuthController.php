<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\SocialCount;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;
use App\Models\FacebookUser; 
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class FacebookAuthController extends Controller
{

    protected $fb;

    public function __construct()
    {
        $this->fb = new Facebook([
            'app_id' => '748722074082244', 
            'app_secret' => '40bdb94328996c909018e6024b0b0d7f', 
            'default_graph_version' => 'v19.0', 
        ]);
    }
    
    public function handleFacebookLogin(Request $request)
{
   
    $accessToken = $request->input('accessToken');
    if (!$accessToken) {
        return response()->json(['error' => 'Token de acceso no recibido.'], 400);
    }

    Log::info('Token de acceso recibido: ' . $accessToken);

    
        // Obtener el usuario autenticado
        $user = Auth::user();

        if (!$user) {
            Log::error('Usuario no autenticado.');
            return response()->json(['error' => 'Usuario no autenticado.'], 401);
        }

        Log::info('Usuario autenticado: ' . $user->iduser);

        $appsecret = '40bdb94328996c909018e6024b0b0d7f';
        $appsecretProof = hash_hmac('sha256', $accessToken, $appsecret);

    
        Session::put('facebook_authenticated', true);
        $response = $this->fb->get('/me?fields=id,name,picture', $accessToken, $appsecretProof);
        $userNode = $response->getGraphUser();
        $facebookId = $userNode->getId();
        $facebookName = $userNode->getName();
        $facebookPicture = $userNode->getPicture()->getUrl();

        Log::info('Facebook ID: ' . $facebookId);
        Log::info('Facebook Name: ' . $facebookName);
        Log::info('Facebook Picture: ' . $facebookPicture);
   

        $socialCount = SocialCount::updateOrCreate(
            [
                'user_id' => $user->iduser,
                'platform' => 'facebook'
            ],
            [
                'social_id' => $facebookId,
                'access_token' => $accessToken
            ]
        );
        // Guardar o actualizar el registro
        $facebookUser=FacebookUser::updateOrCreate(
             [
        'iduser' => $user->iduser,
         ],
    [
       
        'name' => $facebookName,
        'profile_picture' => $facebookPicture,
    ]
);
        Log::info('Token guardado en la base de datos: ' . $socialCount->id);

        return response()->json(['success' => 'Token recibido y guardado correctamente']);

       
        //return response()->json(['success' => 'Usuario autenticado correctamente', 'user' => $user->iduser]);
   
}

}