<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Clave foránea del usuario.
            $table->text('content'); // Contenido del post.
            $table->string('image_path')->nullable(); // Ruta de la imagen, opcional.
            $table->timestamps();
        });

        // Si también deseas crear la tabla de comentarios en la misma migración (opcional):
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('comment'); // Contenido del comentario.
            $table->foreignId('post_id')->constrained()->onDelete('cascade'); // Relacionado con el post.
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relacionado con el usuario que comenta.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Asegúrate de revertir las operaciones en orden inverso a su creación.
        Schema::dropIfExists('comments');
        Schema::dropIfExists('posts');
    }
};
