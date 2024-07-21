<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use App\Enums\TipoCategoria;

class Categoria extends Model
{
    use HasFactory, AsSource;

    protected $fillable = [
        'nombre',
        'tipo',
    ];

    protected $casts = [
        'tipo' => TipoCategoria::class
    ];
    public function gastos()
    {
        return $this->hasMany(Gasto::class);
    }
}
