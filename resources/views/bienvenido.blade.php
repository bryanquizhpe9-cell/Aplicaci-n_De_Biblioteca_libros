@extends('layouts.plantilla')

@section('contenido')
    <div class="p-5 mb-4 bg-light rounded-3 text-center">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">📚Bienvenido a mi Biblioteca de libros</h1>
            <a href="{{ url('/libros') }}" class="btn btn-primary btn-lg" type="button">Ver Libros</a>
            <div class="container mt-5">

    <h2 class="text-center mb-4">Últimos Agregados</h2>
    <div class="row">
        @foreach($libros as $libro)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                @if($libro->imagen_url)
                    <img src="{{ asset($libro->imagen_url) }}" class="card-img-top" alt="{{ $libro->titulo }}" style="height: 300px; object-fit: cover;">
                @else
                    <div class="bg-secondary text-white d-flex justify-content-center align-items-center" style="height: 300px;">
                        <span>Sin Portada</span>
                    </div>
                @endif

                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $libro->titulo }}</h5>
                    <p class="card-text text-muted">{{ $libro->autor }}</p>
                    <span class="badge bg-primary mb-3 align-self-start">{{ $libro->genero }}</span>
                    
                    <a href="{{ route('libros.show', $libro->id) }}" class="btn btn-outline-primary mt-auto">Ver Detalles</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>

@endsection