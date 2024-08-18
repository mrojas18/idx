<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    use HasFactory;
    
    protected $fillable = ['concepto', 'monto_ars', 'monto_usd', 'mes', 'fecha_pago', 'categoria_id'];

    
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
