@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
          
            <div class="col-md-3">
                <div class="column social-login">
                    <h2 class="text-center">Iniciar Sesión</h2>
                    <a href="#">Iniciar Sesión con TikTok</a>
                    <a href="{{ isset($user) ? '#' : url('/instagram/login') }}" class="btn btn-primary">
                    {{ isset($user) ? 'Conectado a Instagram' : 'Conectar con Instagram' }}
</a>
                    <h6>Instagram Profile</h6>
                    @if(isset($user))
        <div>
            <p><strong>ID de usuario:</strong> {{ $user['id'] }}<button>Agregar</button> </p>
            <p><strong>Usuario Instagram:</strong> {{ $user['username'] }}<button>Agregar</button></p>
            <p><strong>Tipo de cuenta:</strong> {{ $user['account_type'] }}<button>Agregar</button></p>
            <p><strong>Cantidad de Fotos:</strong> {{ $user['media_count'] }}<button>Agregar</button></p>
            @if(isset($user['profile_picture_url']))
                <p><strong>Profile Picture:</strong></p>
                <img src="{{ $user['profile_picture_url'] }}" alt="Profile Picture">
            @else
                <p>No profile picture available</p>
            @endif
        </div>
    @else
        <p>No user data available</p>
    @endif
                    <a href="#">Iniciar Sesión con YouTube</a>
                </div>
            </div>
          
            <div class="col-md-6">
                <div class="column">
                    <h2 class="text-center">Diseñar Media Kit</h2>
                    <p>Aquí puedes diseñar tu media kit.</p>
                   
                </div>
            </div>
         
            <div class="col-md-3">
                <div class="column">
                    <h2 class="text-center">Personalizar Media Kit</h2>
                    <p>Aquí puedes personalizar tu media kit.</p>
        
                </div>
            </div>
        </div>
    </div>
@endsection