<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index()
     {
        // Obtener todos los posts ordenados por fecha de creación de manera descendente y paginarlos
        $posts = Post::latest()->paginate(5);
         
        // Pasar los posts paginados a la vista
        return view("posts.index", compact("posts"));
     }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    
     public function store(Request $request)
     {
        // Validar los datos recibidos
        $request->validate([
            'content' => 'required|string|max:255', // Asegúrate de validar según tus necesidades
            'image_path' => 'nullable|file|mimes:jpg,jpeg,png,mp4', // 10 MB como máximo, ajusta según sea necesario
        ]);
     
        // Procesar archivo, si existe
        $filePath = null;
        if ($request->hasFile('image_path') && $request->file('image_path')->isValid()) {
            $file = $request->file('image_path');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Generar un nombre de archivo único
     
            // Mover el archivo a la ubicación deseada
            $file->move(public_path('users/img'), $fileName);
             
            // Establecer la ruta del archivo para almacenar en la base de datos
            $filePath = 'users/img/' . $fileName;

            // Convertir la ruta relativa a una URL completa
            $filePath = asset($filePath);
        }
     
        // Crear un nuevo post en la base de datos
        $post = new Post();
        $post->content = $request->content;
        $post->user_id = Auth::id(); // Asume que tu modelo Post tiene una relación con User
        $post->image_path = $filePath; // Guarda la ruta del archivo, si se cargó uno
        $post->save();
     
        // Redireccionar al usuario con un mensaje de éxito
        return redirect()->route('posts.index')->with('success', 'Post creado exitosamente.');
     }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
