<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;
use App\Models\FacebookUser;

class DashboardController extends Controller

{

    
    public function dashboard()
    {
        // Recupera los datos 
        $user = Auth::user();
        $facebookUser = FacebookUser::where('iduser', $user->iduser)->first();

     
        $facebookName = $facebookUser ? $facebookUser->name : null;
        $facebookPicture = $facebookUser ? $facebookUser->profile_picture : null;

       
        return view('dashboard', compact('facebookName', 'facebookPicture'));
        //return view('dashboard');
    }
}
