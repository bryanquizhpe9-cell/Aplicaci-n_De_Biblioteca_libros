<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LibroController extends Controller
{
    
    public function inicio()
    {
        $libros = DB::table('libros')->latest()->get(); 
        return view('bienvenido', compact('libros'));
    }


    public function index() 
    {
        $libros = DB::table('libros')->get();
        return view('libros.index', compact('libros')); 
    }

    public function create()
    {
        return view('libros.form'); 
    }

    public function store(Request $request)
    {
        $urlImagen = null; 

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('libros', 'public');
            $urlImagen = '/storage/' . $path;
        }

        DB::table('libros')->insert([
            'titulo' => $request->titulo,
            'autor'  => $request->autor,
            'genero' => $request->genero,
            'imagen_url' => $urlImagen,
            'created_at' => now(),      
            'updated_at' => now(),
        ]);

        
        return redirect()->route('libros.index'); 
    }

    public function show($id)
    {
        $libro = DB::table('libros')->where('id', $id)->first();
        return view('libros.show', compact('libro'));
    }

    public function edit($id)
    {
        $libro = DB::table('libros')->where('id', $id)->first();
        return view('libros.edit', compact('libro'));
    }

    public function update(Request $request, $id)
    {
        $datos = [
            'titulo' => $request->titulo,
            'autor'  => $request->autor,
            'genero' => $request->genero,
            'updated_at' => now()
        ];

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('libros', 'public');
            $datos['imagen_url'] = '/storage/' . $path;
        }

        DB::table('libros')->where('id', $id)->update($datos);

        
        return redirect()->route('libros.index');
    }

    public function destroy($id)
    {
        DB::table('libros')->where('id', $id)->delete();
        
       
        return redirect()->route('libros.index');
    }
}



//index = vista principal
//create = vista formulario
// store = Crear registros
//show = detalle registros
//edit = editar registros
//delete = eliminar registros

