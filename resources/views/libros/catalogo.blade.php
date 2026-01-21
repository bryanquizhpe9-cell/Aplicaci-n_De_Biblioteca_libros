@extends('layouts.plantilla')

@section('contenido')
<div class="container mt-5">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold">📚 Nuestra Biblioteca Completa</h1>
        <p class="text-muted text-uppercase small" style="letter-spacing: 2px;">Explora todos los títulos disponibles</p>
        <hr class="w-25 mx-auto border-primary border-2 opacity-75">
    </div>

    <div class="row">
        @foreach($libros as $libro)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm hover-zoom border-0">
                <div style="height: 350px; overflow: hidden;" class="rounded-top">
                    @if($libro->imagen_url)
                        <img src="{{ asset($libro->imagen_url) }}" class="card-img-top w-100 h-100" style="object-fit: cover;" alt="{{ $libro->titulo }}">
                    @else
                        <div class="bg-light d-flex justify-content-center align-items-center h-100 text-muted italic">
                            <span>Sin Portada Disponible</span>
                        </div>
                    @endif
                </div>

                <div class="card-body d-flex flex-column text-center">
                    <h5 class="card-title fw-bold text-dark">{{ $libro->titulo }}</h5>
                    <p class="card-text text-secondary mb-3">de <strong>{{ $libro->autor }}</strong></p>
                    
                    <div class="mb-3 mt-auto">
                        <span class="badge rounded-pill bg-primary px-3 py-2">{{ $libro->genero }}</span>
                    </div>

                    <a href="{{ route('libros.show', $libro->id) }}" class="btn btn-outline-dark w-100 mt-2">
                        Ver Detalles del Libro
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="text-center mt-5 mb-5">
        <a href="{{ url('/') }}" class="btn btn-secondary px-4">Volver al Inicio</a>
    </div>
</div>

<style>
    /* Efecto de zoom suave al pasar el mouse por las tarjetas */
    .hover-zoom:hover {
        transform: scale(1.02);
        transition: transform 0.3s ease;
        box-shadow: 0 10px 20px rgba(0,0,0,0.12) !important;
    }
</style>
@endsection