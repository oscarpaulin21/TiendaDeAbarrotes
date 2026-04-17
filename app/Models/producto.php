<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class producto extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'categoria_id' // 👈 AGREGA ESTO
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}