<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inversion extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $table = 'inversion';
    
    protected $fillable = [
        'accion_id',
        'cantidad',
        'cotizacion',
        'usd',
        'ars',
        'cuenta_id',
        'operacion',
        'fecha'
    ];


    public function cuenta() {
        return $this->belongsTo(Cuenta::class);
    }
    public function accion() {
        return $this->hasOne(Accion::class);
    }
}
