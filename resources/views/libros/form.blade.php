@extends('layouts.plantilla')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header bg-primary text-white">
                    <h3 class="text-center font-weight-light my-2">Agregar Nuevo Libro</h3>
                </div>
                
                <div class="card-body">
                    <form action="{{ route('libros.store') }}" method="POST" enctype="multipart/form-data">
                        
                        @csrf 

                        <div class="form-floating mb-3">
                            <input type="text" name="titulo" class="form-control" id="inputTitulo" placeholder="El Principito" required>
                            <label for="inputTitulo">Título del Libro</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="autor" class="form-control" id="inputAutor" placeholder="Antoine de Saint-Exupéry" required>
                            <label for="inputAutor">Autor</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="genero" class="form-control" id="inputGenero" placeholder="Fantasía" required>
                            <label for="inputGenero">Género</label>
                        </div>

                        <div class="mb-3">
                            <label for="imagen" class="form-label">Subir Portada</label>
                            <input type="file" name="imagen" class="form-control" id="imagen" accept="image/*">
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                          <a href="{{ route('libros.index') }}" class="btn btn-secondary me-md-2">Cancelar</a>
                            <button type="submit" class="btn btn-primary btn-lg">Guardar Libro</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection