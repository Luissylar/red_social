<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Dentro del modelo Comment

    // Define la relación con el usuario que realizó el comentario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}


