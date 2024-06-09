<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\Moneda; 

class Cuenta extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $table="cuentas"; 

    protected $fillable = ['banco_id', 'moneda', 'monto', 'relacion']; 

    protected $casts = [
        'moneda' => Moneda::class
    ];

    public function banco() {
        return $this->belongsTo(Banco::class);
    }

    public function operaciones(){

        return $this->hasMany(Operacion::class, 'id_cuenta', 'id' );
    }

    public function getNombreAttribute()
    {
        return $this->banco->nombre . ' ' . $this->moneda->value; // Accede al valor del Enum Moneda
    }
}
