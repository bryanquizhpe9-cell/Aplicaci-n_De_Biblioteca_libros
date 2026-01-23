@extends('layouts.plantilla')

@section('contenido')
    <div class="d-flex justify-content-between align-items-center mb-3 mt-4">
        <a href="{{ url('/') }}" class="btn btn-dark">
            🏠 Ir al Inicio
        </a>

        <a href="{{ route('libros.create') }}" class="btn btn-primary">
            ➕ Nuevo Libro
        </a>
    </div>

    <h2 class="mb-4">📚 Lista de Gestión de Libros</h2>
    
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Portada</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th class="text-end">Acciones</th> </tr>
            </thead>
            <tbody>
                @forelse ($libros as $libro)
                    <tr>
                        <td>{{ $libro->id }}</td>
                        
                        <td>
                            @if($libro->imagen_url)
                                <img src="{{ asset($libro->imagen_url) }}" alt="Portada" class="img-thumbnail" width="50">
                            @else
                                <span class="text-muted small">Sin imagen</span>
                            @endif
                        </td>

                        <td class="fw-bold">{{ $libro->titulo }}</td>
                        <td>{{ $libro->autor }}</td>
                        
                        <td class="text-end">
                            <a href="{{ route('libros.show', $libro->id) }}" class="btn btn-sm btn-info text-white" title="Ver detalles">
                                👁️ Ver
                            </a>

                            @if(trim(auth()->user()->role) == 'admin')
                                <a href="{{ route('libros.edit', $libro->id) }}" class="btn btn-sm btn-warning" title="Editar">
                                    ✏️ Editar
                                </a>
            
                                <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de borrar este libro?')" title="Eliminar">
                                        🗑️ Borrar
                                    </button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">
                            <em>No hay libros registrados todavía. ¡Agrega el primero!</em>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection