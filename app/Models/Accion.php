<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accion extends Model
{
    use HasFactory;
    protected $table = 'acciones';

    public function inversiones(){

        return $this->hasMany(Inversion::class, 'id_accion', 'id' );
    }
}
