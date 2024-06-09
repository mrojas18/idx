<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    use CrudTrait;
    use HasFactory;

    public function banco() {
        return $this->belongsTo(Banco::class);
    }

    public function inversiones(){

        return $this->hasMany(Inversion::class, 'id_cuenta', 'id' );
    }
}
