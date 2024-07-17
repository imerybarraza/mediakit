@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <section class="text-center py-5">
                <div class="container">
                    <h1 class="display-4">Potencia tu Influencia con Nuestro Mediakit Profesional</h1>
                    <p class="lead">Conecta tus cuentas de Instagram, TikTok y YouTube para crear un mediakit impresionante.</p>
                    <div class="my-4">
                        <a href="#" class="btn btn-primary btn-lg">Soy un Influencer</a>
                    </div>
                    <img src="{{ asset('images/photo-girl2.avif') }}" alt="Influencer usando redes sociales" class="img-fluid">
                </div>
            </section>
        
         
            <section class="call-to-action-images py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 text-center mb-4">
                            <img src="{{ asset('images/photo-boy.avif') }}" alt="Imagen de atención 1" class="img-fluid mb-3">
                            <h4>Aumenta tu Visibilidad</h4>
                            <p>Incrementa tus seguidores y obtén más vistas con nuestras herramientas.</p>
                        </div>
                        <div class="col-md-4 text-center mb-4">
                            <img src="{{ asset('images/photo-girl.avif') }}" alt="Imagen de atención 2" class="img-fluid mb-3 rounded">
                            <h4>Conexión Directa con Marcas</h4>
                            <p>Conecta fácilmente con marcas que buscan influencers como tú.</p>
                        </div>
                        <div class="col-md-4 text-center mb-4">
                            <img src="{{ asset('images/photo-boy2.avif') }}" alt="Imagen de atención 3" class="img-fluid mb-3">
                            <h4>Analíticas y Estadísticas</h4>
                            <p>Obtén informes detallados sobre tu rendimiento en redes sociales.</p>
                        </div>
                    </div>
                </div>
            </section>
        
            <section class="benefits py-5 bg-light">
                <div class="container">
                    <h2 class="text-center mb-4">¿Por qué elegir nuestro servicio de Mediakit?</h2>
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <h3>Conexión Fácil</h3>
                            <p>Conecta tus cuentas de Instagram, TikTok y YouTube en minutos.</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <h3>Personalización Completa</h3>
                            <p>Personaliza tu mediakit con tu estilo único.</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <h3>Análisis Detallado</h3>
                            <p>Obtén análisis y estadísticas detalladas de tus redes.</p>
                        </div>
                    </div>
                </div>
            </section>
        
            <section class="features py-5">
                <div class="container">
                    <h2 class="text-center mb-4">Funcionalidades Destacadas</h2>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Integración con múltiples plataformas</li>
                        <li class="list-group-item">Plantillas personalizables</li>
                        <li class="list-group-item">Estadísticas en tiempo real</li>
                        <li class="list-group-item">Fácil de compartir con marcas</li>
                    </ul>
                </div>
            </section>
        
            <section class="testimonials py-5 bg-light">
                <div class="container">
                    <h2 class="text-center mb-4">Lo que dicen nuestros usuarios</h2>
                  
                    <div id="carouselTestimonials" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('images/testimonial1.jpg') }}" class="d-block w-100" alt="Testimonio 1">
                                <div class="carousel-caption d-none d-md-block">
                                    <p>"¡Excelente plataforma! Me ha ayudado a conectar con muchas marcas."</p>
                                    <h5>- Influencer A</h5>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/testimonial2.jpg') }}" class="d-block w-100" alt="Testimonio 2">
                                <div class="carousel-caption d-none d-md-block">
                                    <p>"El mediakit es muy fácil de usar y personalizar."</p>
                                    <h5>- Influencer B</h5>
                                </div>
                            </div>
                        
                        </div>
                        <a class="carousel-control-prev" href="#carouselTestimonials" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselTestimonials" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Siguiente</span>
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
