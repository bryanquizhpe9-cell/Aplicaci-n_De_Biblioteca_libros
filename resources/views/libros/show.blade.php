@extends('layouts.plantilla')

@section('contenido')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            @if($libro->imagen_url)
                <img src="{{ asset($libro->imagen_url) }}" class="img-fluid rounded shadow" alt="Portada">
            @else
                <div class="alert alert-secondary text-center py-5">
                    No hay imagen disponible
                </div>
            @endif
        </div>

        <div class="col-md-8">
            <h1 class="display-4">{{ $libro->titulo }}</h1>
            <p class="lead text-muted">Escrito por: <strong>{{ $libro->autor }}</strong></p>
            <hr>
            <p><strong>Género:</strong> <span class="badge bg-info text-dark">{{ $libro->genero }}</span></p>
            
            <div class="mt-4">
                <a href="{{ route('libros.index') }}" class="btn btn-secondary">Volver a la lista</a>

                @if(trim(auth()->user()->role) == 'admin')
                    
                    <a href="{{ route('libros.edit', $libro->id) }}" class="btn btn-warning">Editar</a>
    
                    <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ms-2" onclick="return confirm('¿Estás seguro de que quieres eliminar este libro?')">
                            Eliminar
                        </button>
                    </form>

                @endif
            </div>
        </div>
    </div>
</div>
@endsection