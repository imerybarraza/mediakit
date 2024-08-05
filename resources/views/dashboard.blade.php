@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <div class="column social-login">
                    <h2 class="text-center">Iniciar Sesión</h2>
                    <a href="#" class="btn-social-login">Iniciar Sesión con TikTok</a>
                    <a href="{{ isset($instagramUser) ? '#' : url('/instagram/login') }}" class="btn-social-login">
                        {{ isset($instagramUser) ? 'Conectado a Instagram' : 'Conectar con Instagram' }}
                    </a>
                    <h6>Instagram Profile</h6>
                    @if (isset($instagramUser))
                        <div>
                            <p><strong>ID de usuario:</strong> {{ $instagramData['id'] }} <button class="btn btn-primary btn-sm">Agregar</button></p>
                            <p><strong>Usuario de Instagram:</strong> {{ $instagramUser['username'] }} <button class="btn btn-primary btn-sm">Agregar</button></p>
                            <p><strong>Tipo de cuenta:</strong> {{ $instagramUser['account_type'] }} <button class="btn btn-primary btn-sm">Agregar</button></p>
                            <p><strong>Cantidad de Fotos:</strong> {{ $instagramUser['media_count'] }} <button class="btn btn-primary btn-sm">Agregar</button></p>
                            @if (isset($user['profile_picture_url']))
                                <p><strong>Profile Picture:</strong></p>
                                <img src="{{ $instagramUser['profile_picture_url'] }}" alt="Profile Picture">
                            @else
                                <p>Foto de perfil no disponible</p>
                            @endif
                        </div>
                    @else
                        <p>No user data available</p>
                    @endif
                    <a href="#" class="btn-social-login">Iniciar Sesión con YouTube</a>

                 
                  @if(session('facebook_authenticated'))
                        <button class="btn btn-facebook" id="facebook-login-btn" disabled>
                            <div class="facebook-profile">
                                @if ($facebookPicture)
                                    <img src="{{ $facebookPicture }}" alt="Profile Picture" class="facebook-profile-picture">
                                @endif
                                <span class="facebook-profile-name">{{ $facebookName }}</span>
                            </div>
                        </button>
                    @else
                     <button class="btn-social-login btn btn-primary" id="facebook-login-btn">Iniciar sesión con Facebook</button>
                    @endif
                  
    <div>
  
    </div>
                   <script>
                        // Inicialización del SDK de Facebook
                       window.fbAsyncInit = function() {
                            FB.init({
                                appId: 748722074082244, 
                                cookie: true,
                                xfbml: true,
                                version: 'v19.0' 
                            });

                            FB.AppEvents.logPageView();
                        };

                        // Carga asíncrona del SDK de Facebook
                        (function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) {
                                return;
                            }
                            js = d.createElement(s);
                            js.id = id;
                            js.src = "https://connect.facebook.net/en_US/sdk.js";
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));

                        document.getElementById('facebook-login-btn').addEventListener('click', function() {
                            FB.login(function(response) {
                                if (response.authResponse) {
                                    console.log('Sesión iniciada correctamente con Facebook');
                                   // console.log('Access Token:', response.authResponse.accessToken);

                                    // Envío el token de acceso al backend para validarlo 
                                    fetch('/auth/facebook', {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                            },
                                            body: JSON.stringify({
                                                accessToken: response.authResponse.accessToken
                                            })
                                        })
                                        .then(response => response.json())
                                        .then(data => {
                                            console.log('Respuesta del servidor:', data);
                                        })
                                        .catch(error => {
                                            console.error('Error al iniciar sesión con Facebook:', error);
                                        });
                                } else {
                                    console.log('Inicio de sesión cancelado o ocurrió un error');
                                }
                            }, {
                                scope: 'public_profile,email'
                            });
                        });
                    </script>
                </div>
            </div>

            <div class="col-md-9">
                <div class="column">
                    <h2 class="text-center">Diseñar Media Kit</h2>
                    <p>Aquí puedes diseñar tu media kit.</p>

                </div>
            </div>
        </div>
    </div>
@endsection
