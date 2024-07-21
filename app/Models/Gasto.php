<?php

namespace App\Models;

use App\Enums\Moneda;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Gasto extends Model
{
    use HasFactory, AsSource;
    
    protected $fillable = ['concepto', 'monto_ars', 'monto_usd', 'mes', 'fecha_pago', 'categoria_id'];

    
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
