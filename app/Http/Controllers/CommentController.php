<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // Método para almacenar el comentario en la base de datos
    public function store(Request $request, $postId)
    {
        $request->validate([
            'comment' => 'required|string',
        ]);

        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->post_id = $postId;
        $comment->user_id = auth()->id(); // Asegúrate de que el usuario esté autenticado
        $comment->save();

        return back()->with('success', 'Comentario publicado correctamente.');
    }
}
