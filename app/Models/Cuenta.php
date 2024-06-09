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

    public function inversiones(){

        return $this->hasMany(Inversion::class, 'id_cuenta', 'id' );
    }
}
