@extends('layouts.plantilla')

@section('contenido')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow border-0">
                <div class="card-header bg-warning text-white">
                    <h3 class="mb-0">Editar Libro</h3>
                </div>
                <div class="card-body">
                    
                    <form action="{{ route('libros.update', $libro->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Título</label>
                            <input type="text" name="titulo" class="form-control" value="{{ $libro->titulo }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Autor</label>
                            <input type="text" name="autor" class="form-control" value="{{ $libro->autor }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Género</label>
                            <input type="text" name="genero" class="form-control" value="{{ $libro->genero }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label d-block">Portada Actual</label>
                            
                            @if($libro->imagen_url)
                                <div class="mb-2">
                                    <img src="{{ asset($libro->imagen_url) }}" alt="Portada actual" class="img-thumbnail" style="max-height: 150px;">
                                </div>
                                <small class="text-muted">Si no seleccionas una nueva, se mantendrá esta.</small>
                            @else
                                <div class="alert alert-secondary py-2">Sin imagen asignada</div>
                            @endif

                            <label for="imagen" class="form-label mt-2">Cambiar Portada (Opcional)</label>
                            <input type="file" name="imagen" class="form-control" id="imagen" accept="image/*">
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('libros.index') }}" class="btn btn-secondary me-md-2">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Actualizar Cambios</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection